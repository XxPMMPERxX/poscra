<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class Attachment extends Model
{
    use HasFactory, HasUuids;
     
    protected $table = "attachment";
    protected $casts = [
        'attachment_options' => 'json'
    ];

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }
}
