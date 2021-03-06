<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

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
    public $timestamps = false;
    /**
     * Properties that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'score', 'score_verification_image'
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
