<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\MustVerifyEmail;

use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable implements MustVerifyEmail 
{
    use Sortable;

    use Notifiable;
    
    public function groups(){
        return $this->belongsToMany(Groups::class, 'group_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio', 'favorite_game', 'profile_image', 'votes_to_ban'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    

    public function getImageAttribute()
    {
        return $this->profile_image;

    }
}
