<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysqli;
use PhpParser\Node\Stmt\Echo_;

class AddController extends Controller
{

    public function connect(){
        return $connect = new mysqli("92.249.44.52","u337436534_testvaga","d[bm64~K4","u337436534_testvaga");
    }

    public function add(){
        $nome = $_POST['name'];
        $desc = $_POST['desc'];

        $extencao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);
        $name = uniqid("img_",true).".".$extencao;
        $temporario = $_FILES['arquivo']['tmp_name'];
        generate:

        move_uploaded_file($temporario,"img/produtos/$name");

        $con = $this->connect();
        $key = $_COOKIE['key_auth'];
        $result = $con->query("SELECT * FROM user where `key` = '$key'");
        $inf = mysqli_fetch_array($result);
        $id = $inf['id'];
        $con->query("INSERT INTO `produtos` (`id`, `name`, `descricao`, `img`, `id_user`) VALUES (NULL, '$nome', '$desc', '$name', '$id')");
        return redirect("/painel");

    }

    public function del(){
        $uri = explode("/",$_SERVER["REQUEST_URI"]);

        $con = $this->connect();
        $id = $uri[3];
        $con->query("DELETE from produtos where id = '$id'");
        return redirect("/painel");
    }

}
