<?php

namespace App;

use App\todo;
use App\User;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table='images';
    protected $fillable=[
        'todo_id',
        'image',

    ];



    public function todo()
    {
        return $this->hasMany('App\todo');
    }





}
