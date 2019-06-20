<?php namespace GrofGraf\LocalMaillist\Models;

use Model;

/**
 * Maillist Model
 */
class Maillist extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'grofgraf_localmaillist_maillists';

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
