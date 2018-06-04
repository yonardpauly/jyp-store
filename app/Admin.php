<?php

namespace App;

use \Auth;
use \DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function setAdminInfo($admin_id)
    {
        $query = DB::table('admins')
            ->select(
                'name',
                'email'
            );
        $result = $query->get();
        // dd($result);
        return $result;
    }
}
