<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    //Fill in the column details from the database;
    protected $table='payments';
    protected $primaryKey= 'id';
    protected $fillable=['enrollment_id','paid_date','amount'];
    
    use HasFactory;
    public function enrollment(){
        return $this->belongsTo(Enrollment::class);
    }
    public function student()
    {
        return $this->hasOneThrough(Student::class, Enrollment::class, 'id', 'id', 'enrollment_id', 'student_id');
    }
}
