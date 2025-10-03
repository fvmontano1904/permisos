<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $table = "profesor";
    public function divsion(){
        return $this->belongsTo(Division::class,'id_division');
    }
}
