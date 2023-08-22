<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $table = 'employees'; 

   protected $fillable = [
      'nik', 'name', 'date_of_birth', 'gender', 'religion', 'education', 'martial_status', 'work_date', 'worker_status', 'division_id', 'department_id', 'grade_id', 'level_id',
   ];

   // protected $fillable = ['nik'];
}
