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
        'rating',
        'feedback',
        'contract_number',
        'services',
        'address',
        'landline',
        'data_treatment_accepted',
        'authorize_email_documents',
        'typology',
        'sub_typology',
        'parent_pqrs_id',
    ];

    protected $casts = [
        'attachments' => 'array',
        'services' => 'array',
        'deadline_at' => 'date',
        'answered_at' => 'datetime',
        'data_treatment_accepted' => 'boolean',
        'authorize_email_documents' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($pqrs) {
            if (empty($pqrs->cun)) {
                $pqrs->cun = static::generateCun($pqrs->type);
            }
            if (empty($pqrs->deadline_at)) {
                // 15 business days (approx 3 weeks)
                // Using simple addition for now, can be improved with Carbon business days
                $pqrs->deadline_at = now()->addWeekdays(15);
            }
        });
    }

    public static function generateCun($type = null)
    {
        $isSugerencia = $type === 'sugerencia' || $type === 'recurso_subsidio';
        $prefix = $isSugerencia ? 'RAD' : (\App\Models\Setting::where('key', 'cun_provider_code')->value('value') ?? '7714');
        $year = date('y'); // 2 digits
        
        // Get the last sequence number for the current year and prefix
        $lastPqrs = static::where('cun', 'like', "$prefix-$year-%")
            ->orderBy('id', 'desc')
            ->first();

        if ($lastPqrs) {
            $parts = explode('-', $lastPqrs->cun);
            $sequence = intval(end($parts)) + 1;
        } else {
            $sequence = 1;
        }

        return sprintf('%s-%s-%010d', $prefix, $year, $sequence);
    }
    public function messages()
    {
        return $this->hasMany(PqrsMessage::class);
    }

    public function attendants()
    {
        return $this->hasMany(PqrsAttendant::class);
    }

    public function parentPqrs()
    {
        return $this->belongsTo(Pqrs::class, 'parent_pqrs_id');
    }

    public function parentMessages()
    {
        // Fetch messages where the pqrs_id equals the parent_pqrs_id of this record
        // SQL: select * from `pqrs_messages` where `pqrs_messages`.`pqrs_id` = [this->parent_pqrs_id]
        return $this->hasMany(PqrsMessage::class, 'pqrs_id', 'parent_pqrs_id');
    }
}
