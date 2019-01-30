<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['skpd_id', 'subjek', 'lokasi', 'isi'];
    public function skpd()
    {
    	return $this->belongsTo(Skpd::class);
    }
}
