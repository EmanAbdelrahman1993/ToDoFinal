<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    protected $table='files';
    protected $fillable=[
        'todo_id',
        'file',

    ];



    public function todo()
    {
        return $this->hasMany('App\todo');
    }
    public function files()
    {
        return $this->belongsTo('App\files');
    }
}
