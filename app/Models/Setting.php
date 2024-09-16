<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model{

    use HasFactory;
    protected $fillable = [
        'name',
        'logo',
        'large_logo',
        'address',
        'description',
        'location',
        'email',
        'phone',
        'phone2'
    ];
    protected $hidden = ['id', 'created_at', 'updated_at'];
}