<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'username',
        'password'
    ];

    public function person() : HasOne
    {
        return $this->hasOne(Person::class);
    }
}
