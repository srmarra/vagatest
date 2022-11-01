<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysqli;
use PhpParser\Node\Stmt\Echo_;

class AuthController extends Controller
{
    
    public function key($con,$email){
       $result = $con->query("SELECT * FROM user where email = '$email'");
        if($result->num_rows > 0){
            $key =uniqid("Key_",true);
            setcookie("key_auth", $key,time()+10000);
            $con->query("UPDATE `user` SET `key` = '$key' WHERE `user`.`email` = '$email'");
            return $key;
        };
    }

    public function verifyKey($key){
        $sql = "SELECT * FROM user where key = '$key'";
        $con =  $this->connect();
        $result = $con->query($sql);
        if($result->num_rows ==1){
            return true;
        }else{return false;}
    }
    

    
    public function connect(){
        return $connect = new mysqli("92.249.44.52","u337436534_testvaga","d[bm64~K4","u337436534_testvaga");
    }

    public function login(){
        
        $email = $_GET['email'];
        $senha = $_GET['password'];
        $con = $this->connect();

        $result = $con->query("SELECT * FROM user where email = '$email' and  senha = '$senha'");

        if($result->num_rows == 1){
            $this->key($con,$email);
            return redirect("/painel");
        }else{
            return redirect("/?e=Email/Senha incorretos");
        }
    }

    public function register(){
        $nome = $_GET['name'];
        $email = $_GET['email'];
        $senha = $_GET['password'];
        $con = $this->connect();
        
        $result = $con->query("SELECT * FROM user where email = '$email'");

        if($result->num_rows >0){
            return redirect("/registrar?e=Email já cadastrado");
        }

        $con->query("INSERT INTO `user` (`id`, `nome`, `email`, `senha`, `key`) VALUES (NULL, '$nome', '$email', '$senha', '');");
        $this->key($con,$email);
        return redirect("/painel");
    }

    

}
