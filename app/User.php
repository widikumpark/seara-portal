<?php

namespace App;

use Documents;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','company_name','phone','profile_pic'
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

    public function adminlte_image()
    {
        return asset('storage/'.'profile-photos/'.$this->id."/".$this->profile_pic);
    }

    public function adminlte_desc()
    {
        return $this->company_name;
    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }


    public function documents()
    {

        
    }

    public function supportTickets()
    {
        return $this->hasMany('App\SupportTicket', 'user_id');
    }


    public function qoutes()
    {
        return $this->hasMany('App\Quote', 'user_id');
    }
}