<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['startLat', 'startLong', 'endLat', 'endLong', 'task_description', 'shopping_list_image_path'];
}
