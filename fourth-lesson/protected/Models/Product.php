<?php
namespace App\Models;

use App\Model;

class Product
    extends Model
{
    protected static $table = 'products';
    public $title;
    public $price;
    public $description;
    public $image;
}