<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Interfaces\UserInterface;

class UserRepository implements UserInterface
{
    protected $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getUsers()
    {
        try {
            return $this->userModel->all();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function getUser($id)
    {
        try {
            return $this->userModel->where('id', $id)->latest()->first();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}