<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrStorks extends Model
{
    use HasFactory;
    protected $table = 'dr_storks';
    protected $fillable = ['name','email','number','org_name','product_name','location','message','status'];
}
