<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employer_id', 
        'project_title', 
        'project_detail', 
        'project_start_date', 
        'project_start_date', 
        'project_budget', 
        'winner_id', 
        'winner_price',
        'project_paid',
    ];
}
