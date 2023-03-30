<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeCommentaire extends Model
{
    use HasFactory;
    public function comment(): BelongsTo
    {
        return $this->belongsTo(Commentaire::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
