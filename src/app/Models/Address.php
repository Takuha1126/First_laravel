<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name','email','password'
    ];

    public function work()
    {
        return $this->hasMany(Work::class);
    }
}
