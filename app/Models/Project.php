<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'type_id','link','project_status'];

    public function Type(){
        return $this->belongsTo(Type::class);
    }
}
