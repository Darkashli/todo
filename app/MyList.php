<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    protected $table = 'mylists';
    public $primarykey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function tasks()
    {
        return $this->hasMany('App\Task', 'list_id');
    }

    public function counter() 
    {
        // ask database how many tasks in this list
    }
}
