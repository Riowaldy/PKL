<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['post_id', 'judul_task', 'status', 'slug', 'isi_task', 'start', 'due_date'];
    
    public function post()
    {
    	return $this->belongsTo(Post::class);
    }
    public function comments()
    {
    	return $this->hasMany(comment::class);
    }
}
