<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\File;
use App\Models\Attachment;
use finfo;
use Illuminate\Support\Facades\Vite;

class Asset2Webp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:asset-to-webp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'asset画像をwebpに変換';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $files = glob(public_path('build/assets') . "/*");
        $finfo = new finfo();
        
        foreach ($files as $file) {
            if ($finfo->file($file, FILEINFO_MIME_TYPE) === "image/png") {
                var_dump($file);
                $img = imagecreatefrompng($file);
                imagepalettetotruecolor($img);
                imagealphablending($img, true);
                imagesavealpha($img, true);
                imagewebp($img, $file . ".webp");
                $webpFiles[] = $file;
            }
        }
    }
}
