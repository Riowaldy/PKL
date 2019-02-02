<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'post_id',
        'admin_id',
        'member_id',
		'message',
	];

    public function post()
    {
    	return $this->belongsTo(Post::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
