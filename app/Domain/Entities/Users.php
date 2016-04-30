<?php
namespace App\Domain\Entities;

//use Illuminate\Foundation\Auth\Klien as Authenticatable;

/**
 * Class Users
 * @package App\Domain\Entities
 */
class Users extends Entities
{
    /**
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'email', 'status', 'no_hp', 'password'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    public static $tags = 'users';
    /**
     * @var array
     */
    protected $hidden = [
        'remember_token',
        'created_at',
        'updated_at',
        'user_creator',
        'user_updater',
    ];

}