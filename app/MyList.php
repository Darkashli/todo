<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    protected $table = 'mylists';
    protected $primarykey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
