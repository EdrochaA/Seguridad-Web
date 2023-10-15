<?php
//Conectar con la bd
        $hostname = "db";
		$username = "admin";
		$password = "test";
		$db = "database";

		$conn = mysqli_connect($hostname,$username,$password,$db);
		if ($conn->connect_error) {
			die("Database connection failed: " . $conn->connect_error);
		}

        
		//Obtner datos
		$nombre=$_POST['nombre'];
        $dni=$_POST['dni'];
		$tlf=$_POST['telefono'];
        $fechancto=$_POST['fechancto'];
		$email=$_POST['email'];
        $usuario = $_POST['user'];
		$contrasena = $_POST['contra'];

		//Buscar si ya existe el usuario
		$resultado=mysqli_query($conn, "SELECT * FROM `usuario` WHERE usuario='$usuario'")
   		or die (mysqli_error($conn));
		
		$filas=mysqli_num_rows($resultado);
		if ($filas>0) {
			echo '<script>alert("Este email ya esta registrado"); window.location.href="./index.php"</script>';
		}
		else {
		  //Guardar datos en la bd
          mysqli_query($conn, "INSERT INTO `usuario` (nombre, dni, telefono, `fecha nacimiento`, `correo electronico`, usuario, contrasena) VALUES ('$nombre', '$dni', '$tlf', '$fechancto', '$email', '$usuario', '$contrasena')")
          or die (mysqli_error($conn));
		
		echo '<script>alert("Se han registrado los datos correctamente"); window.location.href="./index.php"</script>';
		}
		
		
?>
