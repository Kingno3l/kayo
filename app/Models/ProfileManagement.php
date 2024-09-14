<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type', // qualification or employment_history
        'degree',
        'institution',
        'graduation_year',
        'grade', // Qualification fields
        'job_title',
        'company',
        'start_date',
        'end_date',
        'responsibilities', // Employment history fields
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
