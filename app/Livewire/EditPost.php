<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Post;
use App\Models\Attachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{
    use WithFileUploads;
    
    public $post;

    public $title;           // 建築タイトル
    public $description;     // 建築説明
    public $mcstructure;     // mcstructureファイル
    public $attachment;        // 3dデータもしくは画像データ
    public $attachment_type; // [image] or [3dmodel]
    public $thumbnail;       // 3dデータを画像化もしくは画像そのまま

    public $structure_name; // mcstructure の structureName
    public $attachment_path; // 3dmodelのパス（プレビュー用）

    public $isAttachmentChanged;
    protected $rules = [
        'title' => 'required|max:20',
        'description' => 'max:100',
    ];

    public function render()
    {
        return view('livewire.edit-post');
    }

    public function mount($post) {
        $this->post = $post;
        $this->title = $this->post->title;
        $this->description = $this->post->description;
        $attachment = $this->post->attachment;
        $this->structure_name = $attachment->structure_name;
        $this->attachment_path = $attachment->attachment;
        $this->attachment_type = $attachment->attachment_type;
    }

    public function updatedAttachment() {
        //logger($this->attachment->getClientOriginalExtension());
        if (!$this->attachment) {
            $this->attachment_type = null;
            return;
        }

        //logger($this->attachment->getClientOriginalName());
        $fileName = $this->attachment->getClientOriginalName();
        $extenstion = File::extension($fileName);
        //logger($extenstion);

        switch ($extenstion) {
            case 'png':
            case 'jpeg':
            case 'jpg':
                $this->attachment_type = 'image';
                $this->thumbnail = $this->attachment;
                break;
            case 'glb':
                $this->attachment_type = '3dmodel';

                $this->attachment_path = $this->attachment->store('public');
                $this->dispatch('update_preview_' . str_replace('-', '_', $this->post->id), preview_url: Storage::url($this->attachment_path));
            default:
                $this->addError('attachment_file_error', 'ファイル形式が不正です');
        }
        $this->isAttachmentChanged = true;
    }

    public function updatedThumbnail(){
        logger($this->thumbnail->getClientOriginalName());
        //$this->thumbnail->store('public');
    }

    public function updatedMcstructure(){
        //$this->addError('mcstructure_file_error', 'mcstructureファイルが不正です');
        //$this->reset(['mcstructure']);
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    /**
     * EventListener
     */
    public function setThumbnail() {
        $this->dispatch('setThumbnail_' . str_replace('-', '_', $this->post->id));
    }

    public function clearAttachment() {
        $this->reset([
            'attachment', 
            'attachment_type', 
            'attachment_path', 
            'thumbnail'
        ]);
    }

    public function save(){
        $this->validate(
            $this->isAttachmentChanged ? 
                array_merge($this->rules, ['thumbnail'=>'required'])
                : $this->rules
        );
        //logger('clear validation');

        DB::transaction(function () {
            $this->post->title = $this->title;
            $this->post->description = $this->description ?? '';
            $this->post->save();

            
            $attachment = $this->post->attachment;
            //logger(json_encode($attachment));
            if ($this->thumbnail !== null) {
                //logger('thumbnail_saved');
                $attachment->thumbnail = $this->thumbnail->store('public');
            }

            if ($this->mcstructure !== null) {
                $attachment->structure = $this->mcstructure->store('public');
            }

            if ($this->structure_name != $this->post->attachment->structure_name) {
                $attachment->structure_name = $this->structure_name ?? 'mystructure:test_daaata' . time();
            }
            
            if ($this->attachment !== null) {
                $attachment->attachment = $this->attachment_path ?? $this->attachment->store('public');
                $attachment->attachment_type = $this->attachment_type;
            }
            $attachment->save();

            //$this->dispatch('closeEdit');
            $this->reset();

            return redirect('/dashboard');
        });
        
    }

    public function init(){
        if ($this->attachment_type == "3dmodel") $this->dispatch('update_preview_' . str_replace('-', '_', $this->post->id), preview_url: Storage::url($this->attachment_path));
    }

    public function resetOnClose() {
        $this->mount($this->post);
        //$this->init();
    }

}
