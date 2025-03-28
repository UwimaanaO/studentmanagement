<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
      //Fill in the column details from the database;
      protected $table='enrollments';
      protected $primaryKey= 'id';
      protected $fillable=['enroll_no','batch_id','student_id','join_date','fee'];

      //Creates a relationship Student Model
      public function student(){
            return $this->belongsTo(Student::class);
      }
       
      //Creates a relationship with Batch Mode
      public function batch(){
            return $this->belongsTo(Batch::class);
      }
}
