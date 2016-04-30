<?php
namespace App\Domain\Entities;
/**
 * Class UnitPengolah
 * @package App\Domain\Entities
 */
class Event extends Entities
{
    protected $table = 'event';
    /**
     * @var string
     */
    protected $fillable = ['title', 'start', 'end', 'background_color', 'border_color', 'url', 'content', 'status', 'sifat', 'is_remember'];
    /**
     * @var array
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    public static $tags = 'event';
    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_creator',
        'user_updater',
    ];
}