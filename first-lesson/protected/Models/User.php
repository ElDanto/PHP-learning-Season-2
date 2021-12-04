<?php
require __DIR__ . '/../Model.php';

class User
    extends Model
{
    protected static $table = 'users';
    public $email;
    public $password;
}