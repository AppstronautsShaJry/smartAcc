<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransType extends Model
{
    protected $table = 'trans_types';
    protected $fillable = [
        'name',
    ];
}
