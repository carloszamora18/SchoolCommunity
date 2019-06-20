function validar(){
	var nombre,control,plantel,edad,clave,correo,usuario,expresion;
	nombre= document.getElementById("nombre").value;
	control= document.getElementById("control").value;
	plantel= document.getElementById("plantel").value;
	edad= document.getElementById("edad").value;
	clave= document.getElementById("clave").value;
	correo= document.getElementById("correo").value;
	usuario= document.getElementById("usuario").value;
	expresion = /\w+@\w+\.+^´+[a-z]/;
	
	if(nombre === ""  || control === ""   || plantel === ""  || edad === ""  || clave === ""  || correo === "" ||  usuario === "" )
	{
		alert("todos los campos son obligatorios ");
		return false;
	}
		else if(nombre.length>30){
			alert("el nombre es muy largo")
		}	
		else if(control.length>25 ){
			alert("el numero de control es muy largo")
		}	
		else if(plantel.length>20){
			alert("el nombre del plantel   es muy largo")
		}	
		else if(edad.length>3){
			alert("la edad es muy larga")
		}	
		else if(clave.length>15){
			alert("la clave es muy larga")
		}	
		else if(correo.length>20){
			alert("el correo es muy largo")
		}	
		else if(!expresion.test(correo)){
			alert("el correo es valido")
		}	
		expresion = /\w+@\w+\.+^´+[a-z]/;
		else if(usuario.length>10){
			alert("el usuarioe es muy largo")
		}	
		
}