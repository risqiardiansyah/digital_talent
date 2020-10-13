<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lingkaran extends Model
{
    protected $primaryKey = 'id_lingkaran';
	protected $table = 'lingkaran';
    protected $fillable = [
        'jari_jari', 'hasil', 'created_at', 'updated_at',
    ];
}
