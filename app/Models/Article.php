<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    protected $fillable = ['title', 'content','publication_date','tag_id','category_id'];
    use HasFactory;
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
