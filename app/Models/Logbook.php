<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'hours',
        'week',
        'task',
      ];
    
      public function student()
      {
        return $this->belongsTo(Student::class);
      }
}
