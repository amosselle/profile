<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'abbreviation',    
    ];

    public function college()
    {
        return $this->belongsTo(college::class, 'college_id');
    }
}
