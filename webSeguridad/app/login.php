<?php
    //Iniciar sesion y conectar con bd
		session_start();
        $hostname = "db";
		$username = "admin";
		$password = "test";
		$db = "database";

		$conn = mysqli_connect($hostname,$username,$password,$db);
		if ($conn->connect_error) {
			die("Database connection failed: " . $conn->connect_error);
		}
		//Buscar email y contraseña en bd
		$user=$_POST['usuario'];
		$contraseña=$_POST['contrasena'];
		$_SESSION['usuario']=$user;
		
		$resultado=mysqli_query($conn, "SELECT * FROM `usuario` WHERE usuario.usuario='$user' AND usuario.contrasena='$contraseña'")
   		or die (mysqli_error($conn));
		//Si es correcto, redireccionar a los datos.
		$filas=mysqli_num_rows($resultado);
		if ($filas>0) {
		  header("location:principal.php");
		}
		else {
		  echo '<script>alert("Contraseña incorrecta"); window.location.href="index.php"</script>';;
		}
		mysqli_free_result($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="webSeguridad/app/assets/css/estilosLogin.css">
</head>
<body>
    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Usuario">
                    <input type="password" placeholder="Contraseña">
                    <button type="button" onclick="iniciarSesion()">Iniciar Sesión</button>
                </form>

                <script>
                    function iniciarSesion() {
                        // Aquí deberías agregar lógica para verificar las credenciales del usuario
                        // ...
            
                        // Después de que el usuario se loguea con éxito, redirige a la página principal
                        window.location.href = "principal.html";
                    }
                </script>

                <!--Register-->
                <form action="" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre y Apellidos" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑüÜ\s]+" title="Solo se permiten letras y espacios" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Solo se permiten letras y espacios')">
                    <input type="text" id="dni" name="dni" placeholder="DNI (ej. 12345678-A)" pattern="\d{8}-[a-zA-Z]" title="Formato válido: 12345678-A" required oninput="validarDNI(this)">
                    
                    <script>
                        function validarDNI(input) {
                            const dniRegex = /^\d{8}-[a-zA-Z]$/;
                            const dniValue = input.value;
                    
                            if (!dniRegex.test(dniValue)) {
                                input.setCustomValidity('Formato no válido. Debe ser 12345678-A.');
                            } else {
                                const numeros = dniValue.substring(0, 8);
                                const letraProvided = dniValue.charAt(9);
                                const letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKET';
                    
                                const resto = numeros % 23;
                                const letraCalculada = letrasValidas.charAt(resto);
                    
                                if (letraCalculada !== letraProvided.toUpperCase()) {
                                    input.setCustomValidity('La letra del DNI no es correcta.');
                                } else {
                                    input.setCustomValidity('');
                                }
                            }
                        }
                    </script>
                    
                    
                    <input type="text" id="telefono" name="telefono" placeholder="Teléfono" pattern="\d{9}" title="Debe contener 9 dígitos" required>

                    <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" pattern="\d{4}-\d{2}-\d{2}" title="Formato válido: aaaa-mm-dd (ej. 1988-03-22)" required>

                    <input type="email" id="email" name="email" placeholder="Correo Electrónico" title="Formato válido: ejemplo@servidor.extension" required>


                    <input type="text" placeholder="Usuario">
                    <input type="password" placeholder="Contraseña">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>

    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>