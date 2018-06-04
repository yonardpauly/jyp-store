<?php

namespace App;

use \DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public static function showCustomers()
    {
        $query = DB::table('users')
            ->select(
                'id',
                'name',
                'email',
                'created_at'
            )
        ->orderBy('created_at', 'desc');
        $result = $query->paginate(3);
        return $result;
    }

    public static function customerCheckOutInfo($user_id)
    {
        $query = DB::table('users')
            ->select(
                'name',
                'email'
            )
        ->where('id', $user_id);
        $result = $query->get();
        return $result;
    }
}
