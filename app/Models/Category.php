<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;
class Category extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name', 'slug', 'description', 'parent', 'group', 'count'
    ];
    public $filterFields  = [];
    public $filterKeywords = [];
    public $filterTextFields = ['name'];
    public $timestamps = false;
}
