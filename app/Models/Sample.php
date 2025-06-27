<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'samples';

    protected $guarded = [];
    protected $fillable = ['id_variabel', 'id_data'];


    public function data()
    {
        return $this->hasMany(Data::class, foreignKey: 'id_sample');
    }

}
