<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    /**
     * Table for this Model.
     * 
     * @var string
     */
    protected $table = 'games'; // table for this model

    /**
     * Disable created_at and updated_at timestamp
     * columns.
     * 
     * @var boolean
     */
    public $timestamps = true;


    /**
     * Properties that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'title', 'body',
    ];

}
