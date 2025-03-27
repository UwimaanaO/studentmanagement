<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    //Fill in the column details from the database;
    protected $table='students';
    protected $primaryKey= 'id';
    protected $fillable=['name','address','phone','email'];
    
    use HasFactory;
}
