<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'birth_date',
        'gender',
        'parent_name',
        'parent_phone',
        'parent_email',
        'address',
        'medical_notes',
        'status',
        'admin_notes',
        'student_photo',     // Added
        'birth_certificate', // Added
        'civil_id',          // Added
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'قيد المراجعة',
            'approved' => 'معتمد',
            'rejected' => 'مرفوض',
            'missing_documents' => 'ينقص مستندات',
            default => 'غير محدد',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'yellow',
            'approved' => 'green',
            'rejected' => 'red',
            'missing_documents' => 'orange',
            default => 'gray',
        };
    }

    // بدل getAgeAttribute
    public function getCalculatedAgeAttribute(): string
    {
        if (!$this->birth_date) {
            return '-';
        }

        $birthDate = $this->birth_date; // Carbon بسبب cast
        $now = now();

        $totalMonths = $birthDate->diffInMonths($now);

        $years = intdiv($totalMonths, 12);
        $months = $totalMonths % 12;

        if ($years > 0) {
            return "{$years} سنة و {$months} شهر";
        }

        return "{$months} شهر";
    }




    // وفي الـ view استخدم:

}
