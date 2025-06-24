<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'samples';

    protected $guarded = [];

    public function data()
    {
        return $this->hasMany(Data::class, 'id_sample');
    }

}
