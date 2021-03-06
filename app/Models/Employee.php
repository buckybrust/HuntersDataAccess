<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['fname', 'lname', 'email', 'phone', 'business_id'];

    public function business(){
        return $this->belongsTo(Business::class, 'business_id'); 
    }

    public function path(){
        return route('employees.show', $this);
    }
}
