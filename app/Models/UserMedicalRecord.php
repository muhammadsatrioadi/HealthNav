<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMedicalRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'hospital_id',
        'record_number',
        'examination_date',
        'diagnosis',
        'treatment',
        'doctor_notes',
        'lab_results',
        'status'
    ];

    protected $casts = [
        'examination_date' => 'date',
    ];

    /**
     * Get the user that owns the medical record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the hospital associated with the medical record.
     */
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    /**
     * Generate a unique record number.
     */
    public static function generateRecordNumber()
    {
        $prefix = 'MCU';
        $year = date('Y');
        $lastRecord = self::whereYear('created_at', $year)->latest()->first();
        
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->record_number, -5));
            $newNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '00001';
        }

        return $prefix . $year . $newNumber;
    }
}
