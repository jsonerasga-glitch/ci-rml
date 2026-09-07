<?php
namespace App\Validation;
use App\Models\UserModel;
use App\Models\UserGuestModel;


class Userrules{

  public function validateUser(string $str, string $fields, array $data){
    $model = new UserModel();
    $user = $model->where('email', $data['email'])
                  ->first();

    if(!$user)
      return false;

    return password_verify($data['password'], $user['password']);
  } 
  
  public function validateUserGuest(string $str, string $fields, array $data){
    $model = new UserGuestModel();
    $user = $model->where('email', $data['email'])
                  ->first();

    if(!$user)
      return false;

    return password_verify($data['password'], $user['password']);
  }

}
