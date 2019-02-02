<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membertask extends Model
{
    protected $fillable = ['member_id','task_id'];

    public function member()
    {
    	return $this->belongsTo(Member::class);
    }

    public function task()
    {
    	return $this->belongsTo(Task::class);
    }
}