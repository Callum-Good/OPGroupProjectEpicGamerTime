<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use Sortable;
    /**
     * Table for this Model.
     * 
     * @var string
     */
    protected $table = 'scores'; // table for this model

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
        'score'
    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function games()
    {
        return $this->belongsTo('App\Games');
    }
}