<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicQualification extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

}
