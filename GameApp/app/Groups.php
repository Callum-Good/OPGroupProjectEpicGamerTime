<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


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
        'name', 'game', 'type', 'description', 'grp_image'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function getImageAttribute()
    {
        return $this->grp_image;

    }
}
