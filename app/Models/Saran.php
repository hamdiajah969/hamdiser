<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'sarans';
    protected $primaryKey = 'id_saran';

    protected $fillable = [
        'comment',
        'name',
        'email',
    ];
}
