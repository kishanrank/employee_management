<?php

namespace App\Models;

use App\Models\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, Status;

    public $table = 'departments';

    protected $fillable = ['name', 'status'];
}
