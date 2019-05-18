<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'employer_name', 
        'employer_location', 
        'employer_photo', 
        'short_description', 
        'long_description', 
        'employer_point', 
        'employer_status',
    ];
}
