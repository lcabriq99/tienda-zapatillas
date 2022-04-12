<html>
<head>
  <title>Problema</title>
</head>
<body>
  <?php
include('C:\xampp\htdocs\Prog web\php\db.php');


  mysqli_query($conn, "insert into login(usuario,password) values ('$_REQUEST[usuarioingresar]' , '$_REQUEST[contrasenaingresar]')") or
    die("Problemas en el select" . mysqli_error($conn));

  mysqli_close($conn);
  header("Location: \Prog web\html\perfil.html");
  ?>
</body>

</html>