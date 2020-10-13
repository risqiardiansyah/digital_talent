<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persegi extends Model
{
    protected $primaryKey = 'id_persegi';
	protected $table = 'persegi';
    protected $fillable = [
        'sisi', 'hasil', 'created_at', 'updated_at',
    ];
}
