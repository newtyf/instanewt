<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function like() {
        return $this->hasMany(Like::class, 'post_id');
    }

    protected $fillable = [
        'description',
        'photoUrl',
        'likes',
    ];
}
