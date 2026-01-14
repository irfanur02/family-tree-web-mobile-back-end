<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'nick_name'
    ];

    public function account() : BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
