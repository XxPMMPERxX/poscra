<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\File;
use App\Models\Attachment;

class Image2Webp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:image-to-webp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '画像をwebpに変換';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $files = Storage::allFiles('public');
        $webpFiles = [];
        
        foreach ($files as $file) {
            if (Storage::mimeType($file) === "image/png") {
                $path = Storage::path($file);
                $img = imagecreatefrompng($path);
                imagewebp($img, $path . ".webp");
                $webpFiles[] = $file;
            }
        }
        Log::channel('command')->info(count($webpFiles) . "個のファイルをwebpに変換しました", $webpFiles);
    }
}
