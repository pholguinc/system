<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'courses';

    protected $fillable = ['code','course_name','course_description','status'];


    public function levels()
    {
        return $this->hasOne('App\Models\Level', 'id', 'level_id');
    }


    public function teachers()
    {
        return $this->hasOne('App\Models\Level', 'id', 'level_id');
    }

}
