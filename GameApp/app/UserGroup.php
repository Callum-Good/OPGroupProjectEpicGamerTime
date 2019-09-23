<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class UserGroup extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\User');
    }
    public function groups(){
        return $this->belongsTo('App\Group');
    }
}
