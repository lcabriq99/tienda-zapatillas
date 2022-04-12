<?php

include('C:\xampp\htdocs\Prog web\php\db.php');


$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpassword"];

$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);

if($nr == 1){
    header("Location: \Prog web\html\inicio.html");
}

else if ($nr == 0){
    header("Location: \Prog web\html\perfil.html");  // si da 0 es que da error y no redirige a login.html
}
?>