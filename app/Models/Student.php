<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    static $rules = [
		'code' => 'required',
		'first_name' => 'required',
		'last_name' => 'required',
		'dni' => 'required',
		'email' => 'required',
		'address' => 'required',
		'birthday' => 'required',
		'parents_name' => 'required',
		'phone_home' => 'required',
		'phone_parent' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','first_name','last_name','dni','email','address','birthday','parents_name','phone_home','phone_parent','status','level_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function levels()
    {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }


}
