<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['id_sample', 'id_variabel', 'nilai', 'class', 'hasil_dist', 'hasil_k'];

    public function variabel()
    {
        return $this->belongsTo(Variabel::class, 'id_variabel');
    }

    public function sample()
    {
        return $this->belongsTo(Sample::class, 'id_sample');
    }
}
