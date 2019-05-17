<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $table = 'freelancer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'freelancer_name', 
        'freelancer_location', 
        'freelancer_photo', 
        'short_description', 
        'long_description', 
        'freelancer_point', 
        'freelancer_status',
    ];
}
