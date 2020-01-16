<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $table = "task";

    public function task_childs(){
        return $this->hasMany(TaskChild::class);
    }

}
