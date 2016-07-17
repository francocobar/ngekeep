<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    protected function task(){
      return $this->belongsTo('App\Task','task_id_fk');
    }
}
