<?php
namespace App\Services;

use App\Models\User;

class AccountService implements IAccountService{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }
	/**
	 * @param mixed $data
	 * @return mixed
	 */
	public function createRegister($data) {
        if($data!=null){
            $this->user->create($data);
        }
	}
	
	/**
	 *
	 * @param mixed $data
	 * @return mixed
	 */
	public function checkLogin($data) {
        if($data!=null){
            $bool = auth()->attempt([
                'email' => $data['email'],
                'password' => $data['password']
            ], $data['remember']);
            return $bool;
        }
	}
	
	/**
	 *
	 * @param mixed $data
	 * @return mixed
	 */
	public function logout($data) {
	}
}