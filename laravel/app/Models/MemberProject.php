<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberProject extends Model
{
    protected $fillable = [
        'memeber_id',
        'project_id',
    ];
    public function member()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function project()
    {
        return $this->belongsToMany(Project::class);
    }
}
