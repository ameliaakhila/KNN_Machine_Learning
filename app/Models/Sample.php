<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sample extends Model
{
    use HasFactory;

    protected $table = 'samples';

    protected $fillable = [
        'id_variabel',
        'id_data',
    ];

    public function data()
    {
        return $this->hasMany(Data::class, 'id_sample');
    }
}
