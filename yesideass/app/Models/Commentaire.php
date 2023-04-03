<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [ 'body','user_id','post_id' ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Likes(): HasMany
    {
        return $this->hasMany(LikeCommentaire::class);
    }
   
    
    
}
