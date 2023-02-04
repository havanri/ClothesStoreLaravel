<?php
namespace App\Services;
interface IAccountService{
    public function createRegister($data);
    public function checkLogin($data);
    public function logout($data);
}