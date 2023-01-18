<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'address' => 'array',
        'phone' => 'array',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
