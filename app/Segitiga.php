<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segitiga extends Model
{
    protected $primaryKey = 'id_segitiga';
	protected $table = 'segitiga';
    protected $fillable = [
        'alas', 'tinggi', 'hasil', 'created_at', 'updated_at',
    ];
}
