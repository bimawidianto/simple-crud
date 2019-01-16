<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    
    protected $fillable = ['nik', 'nama', 'unit_id', 'status_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
