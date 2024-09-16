<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class NextOfKinAndReferee extends Model
{
    use HasFactory;

    protected $table = 'next_of_kin_and_referee'; // Ensure this matches your actual table name

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'next_of_kin_full_name',
        'next_of_kin_relationship',
        'next_of_kin_email',
        'next_of_kin_phone',
        'next_of_kin_address',
        'referee1_full_name',
        'referee1_relationship',
        'referee1_email',
        'referee1_phone',
        'referee1_address',
        'referee2_full_name',
        'referee2_relationship',
        'referee2_email',
        'referee2_phone',
        'referee2_address',
    ];


    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
