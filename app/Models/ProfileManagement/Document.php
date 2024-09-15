<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the polymorphic relationship
    public function documentable()
    {
        return $this->morphTo();
    }

}
