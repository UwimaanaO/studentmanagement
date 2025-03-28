<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    //Fill in the column details from the database;
    protected $table='courses';
    protected $primaryKey= 'id';
    protected $fillable=['name','syllabus','duration'];
    
    use HasFactory;
    public function duration(){
        return $this->duration. " months";
    }
}
