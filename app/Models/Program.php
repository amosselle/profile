<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'abbreviation',    
    ];

    public function departiment()
    {
        return $this->belongsTo(departiment::class, 'dept_id');
    }
}
