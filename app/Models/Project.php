<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{

    protected $fillable = ['title', 'description', 'owner', 'git_hub_url'];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}