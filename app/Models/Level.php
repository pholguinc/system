<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'levels';

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }


    public function courses(){

        return $this->belongsTo('App\Models\Course', 'course_id');

    }

}
