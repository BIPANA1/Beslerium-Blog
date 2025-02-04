<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable =['title','image','description','user_id','comment_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comment()
    {
        return $this->hasMany(blog::class,'comment_id');
    }
}
