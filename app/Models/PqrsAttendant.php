<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PqrsAttendant extends Model
{
    protected $fillable = [
        'pqrs_id',
        'user_id',
        'action',
    ];

    public function pqrs()
    {
        return $this->belongsTo(Pqrs::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
