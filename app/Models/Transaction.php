<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = [];

    public function party(): BelongsTo
    {
        return $this->belongsTo(Party::class);
    }



}
