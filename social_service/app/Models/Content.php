<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'link'
    ];

    /**
     * um conteúdo poderá ter diversos comentários
     */

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * um conteúdo pertence a um usuário
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\User', 'likes', 'content_id');
    }
}
