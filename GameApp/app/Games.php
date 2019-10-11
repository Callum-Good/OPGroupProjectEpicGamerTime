<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Games extends Model
{
    use Sortable;
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
        'title', 'description', 'release', 'genre', 'perspective', 'platform', 'game_art'
    ];

    public function getImageAttribute()
    {
        return $this->game_art;

    }
   

}
