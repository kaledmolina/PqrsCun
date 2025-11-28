<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pqrs extends Model
{
    use HasFactory;

    protected $fillable = [
        'cun',
        'first_name',
        'last_name',
        'email',
        'phone',
        'document_number',
        'type',
        'motive',
        'description',
        'status',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($pqrs) {
            if (empty($pqrs->cun)) {
                $pqrs->cun = static::generateCun();
            }
        });
    }

    public static function generateCun()
    {
        $providerCode = \App\Models\Setting::where('key', 'cun_provider_code')->value('value') ?? '4436';
        $year = date('y'); // 2 digits
        
        // Get the last sequence number for the current year
        $lastPqrs = static::where('cun', 'like', "$providerCode-$year-%")
            ->orderBy('id', 'desc')
            ->first();

        if ($lastPqrs) {
            $parts = explode('-', $lastPqrs->cun);
            $sequence = intval(end($parts)) + 1;
        } else {
            $sequence = 1;
        }

        return sprintf('%s-%s-%010d', $providerCode, $year, $sequence);
    }
}
