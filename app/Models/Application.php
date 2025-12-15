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

    public function getAgeAttribute(): string
    {
        $years = $this->birth_date->diffInYears(now());
        $months = $this->birth_date->diffInMonths(now()) % 12;

        if ($years > 0) {
            return "$years سنة و $months شهر";
        }
        return "$months شهر";
    }
}
