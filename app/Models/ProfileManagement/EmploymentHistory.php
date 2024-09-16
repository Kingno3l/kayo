<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class EmploymentHistory extends Model
{
    use HasFactory;

    protected $guarded = [];


    // If you want to define relationships, you can do it here
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
