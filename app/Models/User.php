<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use App\Models\ProfileManagement\Document;
use App\Models\ProfileManagement\AcademicQualification;
use App\Models\ProfileManagement\EmploymentHistory;
use App\Models\ProfileManagement\NextOfKinAndReferee;
use App\Models\ProfileManagement\Social;
use App\Models\Payment\Payment;




class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
        
    }

    public function UserOnline()
    {
        return Cache::has('user-is-online' . $this->id);
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    // Academic qualifications relationship
    public function academicQualifications()
    {
        return $this->hasMany(AcademicQualification::class, 'user_id');
    }

    // Employment history relationship
    public function employmentHistory()
    {
        return $this->hasMany(EmploymentHistory::class, 'user_id');
    }

    // Next of kin and referee relationship
    public function nextOfKinAndReferee()
    {
        return $this->hasMany(NextOfKinAndReferee::class, 'user_id');
    }

    // Socials relationship
    public function socials()
    {
        return $this->hasMany(Social::class, 'user_id');
    }

}
