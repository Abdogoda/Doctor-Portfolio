<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $table = "socials";
    protected $fillable = [
        'whatsapp',
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'tiktok',
        'linkedin'
    ];

    protected $hidden = ['id', 'created_at', 'updated_at'];
}