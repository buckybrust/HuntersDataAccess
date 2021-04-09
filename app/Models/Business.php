<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'logo'];

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function path(){
        return route('businesses.show', $this);
    }
}
