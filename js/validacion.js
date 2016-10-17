function es_vacio(){
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var dni = document.getElementById("dni").value;
    var cuil = document.getElementById("cuil").value;
    var barrio = document.getElementById("barrio").value;
    var calle = document.getElementById("calle").value;
    var numero = document.getElementById("numero").value;
    var mail = document.getElementById("email").value;
    var tel = document.getElementById("telefono").value;
    var desc = document.getElementById("descripcion").value;
    //var mes = document.getElementById("meses").value;
    //var dia = document.getElementById("dias").value;
    //var horario = document.getElementById("horario").value;
    //var hora = document.getElementById("txt").value;
        if(nombre && apellido && dni && cuil && barrio && calle && numero && mail && tel && desc != ""){
        document.getElementById("siguiente").removeAttribute('disabled');
        }
        else{
        document.getElementById("siguiente").setAttribute('disabled', 'disabled');
        }
}
    
function habilitar(){
	switch(document.forms[0].tipo_entidad.selectedIndex){
		case 0: 
			document.forms[0].cuit.disabled=false;
			break;
		case 1: 
			document.forms[0].cuit.disabled=false;
			break;
		case 2: 
			document.forms[0].cuit.disabled=false;
			break;
        case 3: 
			document.forms[0].cuit.disabled=true;
			break;
	}
}

function texto(value)
    	{
			if(value=="96"){
				// habilitamos
				var x = "Incluye borrado del sistema operativo y copia de respaldo de todos los archivos importantes del usuario. ($150)";
				document.getElementById("txt").innerHTML = x;
			}
            else if(value=="97"){
				var x = "Incluye instalaci&oacuten del sistema operativo y drivers b&aacutesicos para el correcto funcionamiento. Incluye un antivirus y un navegador. La activaci&oacuten del Windows es opcional. ($250)";
                document.getElementById("txt").innerHTML = x;
            }
		}
    /*var apellido = document.getElementById("apellido").value;
        if(apellido != ""){
        document.getElementById("enviar").removeAttribute('disabled');
        }
        else{
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
        }
    
    var dni = document.getElementById("dni").value;
        if(dni != ""){
        document.getElementById("enviar").removeAttribute('disabled');
        }
        else{
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
        }
    
    var cuil = document.getElementById("cuil").value;
        if(cuil != ""){
        document.getElementById("enviar").removeAttribute('disabled');
        }
        else{
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
        }
    
    var barrio = document.getElementById("barrio").value;
        if(barrio != ""){
        document.getElementById("enviar").removeAttribute('disabled');
        }
        else{
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
        }
    
    var calle = document.getElementById("calle").value;
        if(calle != ""){
        document.getElementById("enviar").removeAttribute('disabled');
        }
        else{
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
        }
    
    var numero = document.getElementById("numero").value;
        if(numero != ""){
        document.getElementById("enviar").removeAttribute('disabled');
        }
        else{
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
        }
    
    var mail = document.getElementById("email").value;
        if(mail != ""){
        document.getElementById("enviar").removeAttribute('disabled');
        }
        else{
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
        }
    
    var horario = document.getElementById("horario").value;
        if(horario != ""){
        document.getElementById("enviar").removeAttribute('disabled');
        }
        else{
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
        }
    }*/

/*creo una variable de tipo booleana que en principio tendrá un valor true(verdadero), 
y que retornaremos en false(falso) cuando nuestra condición no se cumpla
var todo_correcto = true;

El primer campo que comprobamos es el del nombre. Lo traemos por id y verificamos 
la condición, en este caso, por ejemplo, le decimos que tiene que tener más de 2 dígitos 
para que sea un nombre válido. Si no tiene más de dos dígitos, la variable todo_correcto 
devolverá false.

if(document.getElementById('nombre').value.length < 2 ){
    todo_correcto = false;
}

if(document.getElementById('apellido').value.length < 2 ){
    todo_correcto = false;
}
    
if(isNaN(document.getElementById('dni').value.length < 2 )){
    todo_correcto = false;
}
    
if(isNaN(document.getElementById('cuil').value.length < 2 )){
    todo_correcto = false;
}
   
Hacemos lo mismo con el campo dirección. En este caso le pediremos al usuario que 
introduzca al menos 10 caracteres.
if(document.getElementById('barrio').value.length < 5 ){
    todo_correcto = false;
}

if(document.getElementById('calle').value.length < 5 ){
    todo_correcto = false;
}

if(isNaN(document.getElementById('numero').value)){
    todo_correcto = false;
}
    
/*Para comprobar la edad, utilizaremos la función isNaN(), que nos dirá si el valor 
ingresado NO es un número (NaN son las siglas de Not a Number). Si la edad no es un 
número, todo_correcto será false.*/
/*if(isNaN(document.getElementById('edad').value)){
    todo_correcto = false;
}

Para comprobar el email haremos uso de una expresión regular. Esto es una secuencia 
de caracteres que nos dirá si el valor ingresado por el usuario tiene estructura de 
correo electrónico. Lo que hacemos es obtener el value del campo de texto destinado 
al email, y le aplicamos el método test() del objeto global RegExp(que nos permite 
trabajar con expresiones regulares).
var expresion = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
var email = document.formulario.email.value;
if (!expresion.test(email)){
    todo_correcto = false;
}

Para validar el select debemos añadir un value distinto a cada option. En el 
código, he asignado un value con  valor vacío al primer option. Los siguientes, 
al no estar definidos toman el valor por defecto. Por tanto, si todos tienen value, 
lo único que tenemos que comprobar es que este no sea vacío. Si es vacío, todo_correcto 
será false.
if(document.getElementById('horario').value == ''){
    todo_correcto = false;
}

Validaremos también el checkbox del formulario. Todos los 
checkbox tienen una propiedad llamada checked. Entonces 
hacemos el if y decimos que si nuestro checkbox NO está 
checked, estará mal.
if(!document.getElementById('acepto').checked){
    todo_correcto = false;
}

Por último, y como aviso para el usuario, si no está todo bién, osea, si la variable 
todo_correcto ha devuelto false al menos una vez, generaremos una alerta advirtiendo 
al usuario de que algunos datos ingresados no son los que esperamos.
if(!todo_correcto){
alert('Algunos campos no están correctos, vuelva a revisarlos');
}

return todo_correcto;
}*/
