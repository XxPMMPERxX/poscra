<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Post;
use App\Models\Attachment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{
    use WithFileUploads;
    
    public $title;           // 建築タイトル
    public $description;     // 建築説明
    public $mcstructure;     // mcstructureファイル
    public $attachment;        // 3dデータもしくは画像データ
    public $attachment_type; // [image] or [3dmodel]
    public $thumbnail;       // 3dデータを画像化もしくは画像そのまま

    public $structure_name; // mcstructure の structureName
    public $attachment_path;

    protected $rules = [
        'title' => 'required|max:20',
        'description' => 'max:100',
        'mcstructure' => 'required|file',
        'attachment'    => 'required|file',
    ];

    public function render()
    {
        return view('livewire.edit-post');
    }

    public function updatedAttachment() {
        //logger($this->attachment->getClientOriginalExtension());
        if (!$this->attachment) {
            $this->attachment_type = null;
            return;
        }

        //logger($this->attachment->getMimeType());
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

                if($this->attachment_path) {
                    Storage::delete($this->attachment_path);
                }
                $this->attachment_path = $this->attachment->store('public');
                $this->dispatch('update_preview', preview_url: Storage::url($this->attachment_path));
        }
    }

    public function updatedThumbnail(){
        logger($this->thumbnail->getClientOriginalName());
        //$this->thumbnail->store('public');
    }

    public function updatedMcstructure(){
        $this->addError('mcstructure_file_error', 'mcstructureファイルが不正です');
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
        //
        logger('save');
    }

}
