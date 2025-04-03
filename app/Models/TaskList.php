<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskList extends Model
{

    protected $table = 'lists';
    protected $fillable= ['name'];

    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }

}
