<?php namespace Intertech\Artemonovteam\Models;

use Model;

/**
 * Tag Model
 */
class Tag extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'intertech_artemonovteam_tags';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
