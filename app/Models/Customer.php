<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
class Customer extends Model
{
    use HasFactory, Filterable;
    protected $fillable = [
        'name', 'gender', 'country', 'birthday', 'passport', 'passport_expiration', 'album'
    ];

    public $filterFields  = ['gender', 'country'];
    public $filterKeywords = ['name', 'passport'];
    public $filterTextFields = ['name', 'passport'];
}
