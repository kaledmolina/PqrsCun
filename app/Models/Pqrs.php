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
        'operator',
        'document_type',
        'department',
        'city',
        'subject_cun',
        'deadline_at',
        'answer',
        'answered_at',
    ];

    protected $casts = [
        'attachments' => 'array',
        'deadline_at' => 'date',
        'answered_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($pqrs) {
            if (empty($pqrs->cun)) {
                $pqrs->cun = static::generateCun();
            }
            if (empty($pqrs->deadline_at)) {
                // 15 business days (approx 3 weeks)
                // Using simple addition for now, can be improved with Carbon business days
                $pqrs->deadline_at = now()->addWeekdays(15);
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
    public function messages()
    {
        return $this->hasMany(PqrsMessage::class);
    }
}
