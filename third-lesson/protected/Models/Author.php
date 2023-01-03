<?php
namespace App\Models;

use App\Model;
use App\Db;

class Author
    extends Model
{
    protected static $table = 'authors';
    public $name;
}