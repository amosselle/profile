<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
    ];


    public function university()
    {
        return $this->belongsTo(University::class, 'uni_id');
    }
}
