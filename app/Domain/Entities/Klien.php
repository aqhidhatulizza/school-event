<?php
namespace App\Domain\Entities;
use Illuminate\Foundation\Auth\Klien as Authenticatable;
/**
 * Class Klien
 * @package App\Domain\Entities
 */
class Klien extends Entities
{
    /**
     * @var string
     */
    protected $table = 'klien';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'email','status','no_hp'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    public static $tags = 'klien';
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