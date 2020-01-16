<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskChild extends Model
{
    protected $table = "task_child";

    public function task(){
        return $this->belongsTo(Task::class);
    }
}
