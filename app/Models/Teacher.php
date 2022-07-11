<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'teachers';

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function courses(){

        return $this->belongsTo('App\Models\Course', 'course_id');

    }

}
