<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailResets extends Model
{
    use HasFactory;
    protected $table = 'email_resets';
    protected $fillable = ['user_id','email','token','isverify'];
}
