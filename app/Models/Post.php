<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Ramsey\Uuid\Type\Integer;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'published_at',
        'body',
        'user_id',
        'category_id'
    ];

    public function setSlugAttribute(){
        $this->attributes['url'] = Str::slug($this->title);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function comments(){
        return $this->hasMany(PostComment::class, 'post_id');
    }
}

