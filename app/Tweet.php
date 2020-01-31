<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $table = 'Tweets';
    protected $primaryKey = 'id';
    public $timestamp = false;
}
