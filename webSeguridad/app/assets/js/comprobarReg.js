function comprobarReg(){

    var nombre = /(^[A-ZÁÉÍÓÚ]{1}([a-zñáéíóú]+){2,})(\s[A-ZÁÉÍÓÚ]{1}([a-zñáéíóú]+){2,})?$/;

    var usuario = document.getElementById("user").value;
    console.log(usuario)

    var fechancto = document.getElementById("fechancto").value.split("-"); 
    var fechavalida = new Date(parseInt(fechancto[0]),parseInt(fechancto[1]),parseInt(fechancto[2]));
    var hoy = new Date();
    
    var anoncto = parseInt(fechancto[0]);
    var mesncto = parseInt(fechancto[1]);
    var diancto = parseInt(fechancto[2]);

    var anohoy = hoy.getFullYear();
    // var meshoy = hoy.getMonth();
    // var diahoy = hoy.getDate(); 
    


    
    var telefono = /^[0-9]{9}$/;



    
    var dniPattern = /^[0-9]{8}[A-Z]$/;
    var dni = document.getElementById("dni").value;
    var dniN = dni.substr(0,dni.length-1);
    var letra = dni.substr(dni.length-1,1);
    var esquemaLetras = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var n = dniN%23;
    var l = esquemaLetras.substring(n,n+1);



;
    var email = /^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}$/;
    var contrasena = /^[a-zA-Z0-9]{8,}$/;
    
    if (!nombre.test(document.getElementById("nombre").value)){
        alert ("Nombre no valido\nDebe empezar por mayuscula");
        return false;
    }

    else if (!dniPattern.test(dni)){
        alert("DNI introducido incorrecto\nTiene que tener el siguiente formato: 00000000A");
        return false;
    }

    else if(l!=letra.toUpperCase()){
        alert("El DNI no existe.")
        return false;
    }

    else if (!telefono.test(document.getElementById("telefono").value)){
        alert("Teléfono introducido incorrecto\nTiene que ser un numero de 9 digitos." );
        return false;
    }

    else if (isNaN(fechavalida)){
        alert("Fecha introducida incorrecta\nTiene que tener la siguiente forma: aaaa-mm-dd");
        return false;
    }

    else if(mesncto<1||mesncto>12||diancto<1||diancto>31){
        alert("Fecha incorrecta");
        return false;
    }

    else if ( anohoy - anoncto < 18 ){
        alert ("Tienes que ser mayor de edad");
        return false;  
    }

    else if (!email.test(document.getElementById("email").value)){
        alert("Correo introducido incorrecto");
        return false;
    }

    else if (usuario.trim() === '') {
        alert("El campo de usuario no puede estar vacío");
        return false;
    }

    else if(!contrasena.test(document.getElementById("contra").value)){
        alert("La contraseña debe tener al menos 8 caracteres"); 
        return false;
    }


    return true;
}
