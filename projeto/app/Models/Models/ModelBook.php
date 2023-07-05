<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    public $timestamps = false;
    protected $table = 'tasks';
    protected $fillable = ['titulo', 'descricao', 'status'];


}
