<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class UserGroup extends Model
{
    use Sortable;
    //
    protected $table = 'users_groups'; // table for this model

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'group_id'
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }
    public function groups(){
        return $this->belongsTo('App\Groups');
    }
}
