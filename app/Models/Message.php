<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model{

    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'service_id',
        'message',
        'read'
    ];

    public function service(): BelongsTo{
        return $this->belongsTo(Service::class);
    }
}