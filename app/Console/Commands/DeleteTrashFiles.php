<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Attachment;

class DeleteTrashFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-trash-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '不要なファイル類を削除';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ignoreFiles = [
            'public/.gitignore'
        ];

        $files = Storage::allFiles('public');
        $deleteFiles = [];

        foreach ($files as $file) {

            if (in_array($file, $ignoreFiles)) continue;

            if(
                !Attachment::where('thumbnail', $file)
                    ->orWhere('structure', $file)
                    ->orWhere('attachment', $file)
                    ->exists()
            ) {
                $deleteFiles[] = $file;
            }
        }

        Storage::delete($deleteFiles);
        Log::channel('command')->info(count($deleteFiles) . "個のファイルを削除しました。", $deleteFiles);
    }
}
