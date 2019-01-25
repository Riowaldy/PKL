<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['post_id', 'user_id', 'judul_task', 'status', 'slug', 'isi_task', 'due_date'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
    public function comments()
    {
    	return $this->hasMany(comment::class);
    }
}
