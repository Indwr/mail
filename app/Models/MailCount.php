<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailCount extends Model
{
    use HasFactory;
    protected $table = 'mail_count';
    protected $fillable = ['count'];
}
