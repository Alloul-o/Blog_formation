<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    protected $fillable = ['titre', 'contenu'];
    use HasFactory;
    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
