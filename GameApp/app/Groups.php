<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use Sortable;
    /**
     * Table for this Model.
     * 
     * @var string
     */
    protected $table = 'groups'; // table for this model

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
        'name', 'game', 'type', 'description'
    ];
}
