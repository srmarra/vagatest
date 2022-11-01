<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysqli;

class PainelController extends Controller
{

    public function connect(){
        return $connect = new mysqli("92.249.44.52","u337436534_testvaga","d[bm64~K4","u337436534_testvaga");
    }

    public function verifyKey($key){
        $sql = "SELECT * FROM user where `key` = '$key'";
        $con =  $this->connect();
        $result = $con->query($sql);
        if($result->num_rows ==1){
           $cons= mysqli_fetch_array($result);
            return $cons['id'];
        }else{return 0;}
    }



    public function painel(){
        if(!isset($_COOKIE['key_auth'])){
            return redirect("/");
        }

        $idUser = $this->verifyKey($_COOKIE['key_auth']);
        if($idUser == 0){
            setcookie("key_auth");
            return redirect("/");
        }

        $con = $this->connect();
        $resulta = $con->query("SELECT * FROM produtos where id_user = '$idUser'");
        return view("painel" ,["produtos" => $resulta]);
    }
}
