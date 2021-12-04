<?php
require_once __DIR__ . '/../Model.php';
class Product
    extends Model
{
    protected static $table = 'products';
    public $title;
    public $price;
    public $description;
    public $image;
}