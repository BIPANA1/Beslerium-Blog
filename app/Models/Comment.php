<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =['comment','blog_id','user_id'];



    public function blog()
    {
        return $this->belongsTo(blog::class,'blog_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }

}
