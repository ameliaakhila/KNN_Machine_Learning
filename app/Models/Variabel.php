<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variabel extends Model
{
    use HasFactory;

    protected $table = 'variabels';

    protected $fillable = [
        'variabel',
        'status',
        'keterangan',
    ];

    public const STATUS_OPTIONS = ['Variabel', 'Variabel Uji'];

    public function data()
    {
        return $this->hasMany(Data::class, 'id_variabel');
    }
}
