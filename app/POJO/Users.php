<?php
namespace App\POJO;
use DB;
use Illuminate\Http\Request;
use Http\Requests;
use App\User;




class Users
{

    protected $username;
    protected $email;
    protected $id;

    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($value)
    {
        $this->username = $value;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;

    }

    public function setId($value){
        $this->id = $value;
    }
    
    public function getId(){
        return $this->id;
    }

   

    public function AllUserContent($value){


        $array = [];
        
        
      /*get -> $user['0'] | first -> $user ;*/
                $user = User::where('id', '=', $value)->first();

           
                $array = array(
                    'id' => $user->id,
                    'email' => $user->email,
                    'username' => $user->username
                );
                
                
                
                return $array;
    }
}