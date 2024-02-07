<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;
    protected $fillable=['book_id','client_id','loan_date','loan_days','status'];
    protected $table = 'prestamos';
}
