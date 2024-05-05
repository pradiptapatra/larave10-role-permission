<?php
namespace App\Interfaces;

interface RoleInterface
{
    public function getRoles();
    public function getRole($id);
    public function getModules();
}