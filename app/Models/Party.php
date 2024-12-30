<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Party extends Model
{
    protected $table = 'parties';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function trans(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
