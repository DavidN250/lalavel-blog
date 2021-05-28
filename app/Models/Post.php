<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use App\Models\User;

class Post extends Model
{
    use HasFactory,Loggable;

    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;


    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}