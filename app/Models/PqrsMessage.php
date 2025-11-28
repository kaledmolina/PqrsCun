<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PqrsMessage extends Model
{
    protected $fillable = [
        'pqrs_id',
        'role',
        'content',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function pqrs()
    {
        return $this->belongsTo(Pqrs::class);
    }
}
