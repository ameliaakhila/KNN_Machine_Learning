<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variabel extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $table = 'variabels';
    protected $fillable = [
        'variabel',
        'status',
        'keterangan',
    ];
    const STATUS_OPTIONS = ['Variabel', 'Variabel Uji'];
    public function data()
    {
        return $this->hasMany(Data::class, 'id_variabel');
    }

}


