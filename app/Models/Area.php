<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'place_id',
        // Add other relevant fields based on your needs
      ];
    
      public function student()
      {
        return $this->belongsTo(Student::class);
      }
    
      public function place()
      {
        return $this->belongsTo(Place::class);
      }
}
