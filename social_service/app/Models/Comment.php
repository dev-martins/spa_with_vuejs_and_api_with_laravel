<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content_id',
        'content',
    ];

    /**
     * Um comentário pertence a um usuário
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Um Comentário pertence a um conteúdo
     */

    public function content()
    {
        return $this->belongsTo('App\Models\Content');
    }
}
