<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class Post extends Model
{
    use HasFactory, HasUuids;

    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function attachment() {
        return $this->hasOne(Attachment::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

}
