<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function serviceApplications()
    {
        return $this->hasMany(ServiceApplication::class);
    }
}
