<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    protected $table='todos';
    protected $fillable=[
        'user_id',
        'name',
        'description',
        'progress',
        'due_date'
    ];


    public function User()
    {
        return $this->hasOne('App\User');
    }
    public function images()
    {
        return $this->belongsTo('App\images');
    }

}
