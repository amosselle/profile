<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Support\Facades\Hash;

class Student extends Model  implements Authenticatable
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'regno',
        'email',
        'phone',
        'gender',
        'program',
        'yos',
        'password',
        'uni_id',
        'college_id',
        'dept_id',
        'program_id'
    ];

    protected $hidden = [
        'password',
    ];

    use AuthenticatableTrait;


    protected $table = 'students';
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function programs(){
        return $this->belongsTo(Program::class);
    }
}
