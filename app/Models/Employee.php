<?php

namespace App\Models;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'type',
        'gender'
    ];

    public function manager(){
        return $this->belongsTo(Manager::class);
    }
}
