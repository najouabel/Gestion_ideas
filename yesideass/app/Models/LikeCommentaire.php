<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LikeCommentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'commentaire_id',
    ];
    public function comment(): BelongsTo
    {
        return $this->belongsTo(Commentaire::class);
    }
    public function user(): BelongsTo
    {
        // return $this->belongsTo(User::class);
        return $this->belongsTo(User::class);
    }
    
    
}
