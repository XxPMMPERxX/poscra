<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Post;
use App\Models\Attachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Aternos\Nbt\Tag\Tag as NbtTag;
use Aternos\Nbt\IO\Reader\StringReader;
use Aternos\Nbt\NbtFormat;
use Hashids\Hashids;
use Exception;

class CreatePost extends Component
{
    use WithFileUploads;
    
    public $title;           // 建築タイトル
    public $description;     // 建築説明
    public $mcstructure;     // mcstructureファイル
    public $attachment;        // 3dデータもしくは画像データ
    public $attachment_type; // [image] or [3dmodel]
    public $thumbnail;       // 3dデータを画像化もしくは画像そのまま

    //public $structure_name; // mcstructure の structureName
    public $attachment_path; // 3dmodelのパス（プレビュー用）
    public $attachment_options; // 3dmodelのカメラ情報など

    protected $rules = [
        'title' => 'required|max:20',
        'description' => 'max:100',
        'mcstructure' => 'required|file|max:5120',
        'thumbnail' => 'required|file|max:5120',
        'attachment'    => 'required|file|max:5120',
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function updatedAttachment() {
        if (!$this->attachment) {
            $this->attachment_type = null;
            return;
        }

        $fileName = $this->attachment->getClientOriginalName();
        $extenstion = File::extension($fileName);

        switch ($extenstion) {
            case 'png':
            case 'jpeg':
            case 'jpg':
                $this->attachment_type = 'image';
                $this->thumbnail = $this->attachment;
                break;
            case 'glb':
                $this->attachment_type = '3dmodel';

                if($this->attachment_path) {
                    Storage::delete($this->attachment_path);
                }
                $this->attachment_path = $this->attachment->store('public');
                $this->dispatch('update_preview', preview_url: Storage::url($this->attachment_path));
                break;
            default:
                $this->addError('attachment_file_error', 'サムネイルのファイル形式が不正です');
                $this->reset(['attachment']);
        }
    }

    public function updatedMcstructure(){
        $this->validateMcstructure();
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    /**
     * EventListener
     */
    public function setThumbnail() {
        $this->dispatch('setThumbnail');
    }

    public function clearAttachment() {
        if($this->attachment_path) {
            Storage::delete($this->attachment_path);
        }
        $this->reset([
            'attachment', 
            'attachment_type', 
            'attachment_path', 
            'thumbnail'
        ]);
    }

    public function save(){
        
        $this->validate();
        if (!$this->validateMcstructure()) {
            return;
        }

        DB::transaction(function () {
            $post = new Post();
            $post->title = $this->title;
            $post->user_id = auth()->user()->id;
            $post->description = $this->description ?? '';
            $post->save();

            $attachment = new Attachment();
            $attachment->post_id = $post->id;
            $attachment->thumbnail = $this->thumbnail->store('public');
            $attachment->structure = $this->mcstructure->store('public');

            $hashid = new Hashids($post->id, 8);
            $hashid = $hashid->encode(time());
            $structure_name = "mystructure:poscra_" . $hashid;
            $attachment->structure_name = $structure_name;

            $attachment->attachment = $this->attachment_path ?? $this->attachment->store('public');
            $attachment->attachment_type = $this->attachment_type;
            if ($this->attachment_options !== null) {
                $attachment->attachment_options = json_encode($this->attachment_options);
            }
            
            $attachment->save();

            //$this->dispatch('closeEdit');
            $this->reset();

            return redirect('/dashboard');
        });
        
    }

    public function validateMcstructure() {
        $mcstructure = File::get($this->mcstructure->getRealPath());
        try {
            $mcstructure = @NbtTag::load(new StringReader($mcstructure, NbtFormat::BEDROCK_EDITION));
        } catch (Exception $exception) {
            logger(json_encode($exception));
            $this->addError('mcstructure_file_error', 'mcstructureファイルが不正です');
            return false;
        }
        
        if (!$mcstructure) {
            $this->addError('mcstructure_file_error', 'mcstructureファイルが不正です');
            return false;
        }
        
        return true;
    }

}
