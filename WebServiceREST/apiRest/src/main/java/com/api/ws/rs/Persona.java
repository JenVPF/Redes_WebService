package com.api.ws.rs;

public class Persona {
    String nombre;
    String apellido_p;
    String apellido_m;
    String genero;
    String persona;

    public Persona(String nombre, String apellido_p, String apellido_m, String genero, String persona) {
        this.nombre = nombre;
        this.apellido_p = apellido_p;
        this.apellido_m = apellido_m;
        this.genero = genero;
    }

    public String getPersona() {
		return persona;
	}

	public void setPersona(String persona) {
		this.persona = persona;
	}
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido_p() {
        return apellido_p;
    }

    public void setApellido_p(String apellido_p) {
        this.apellido_p = apellido_p;
    }

    public String getApellido_m() {
        return apellido_m;
    }

    public void setApellido_m(String apellido_m) {
        this.apellido_m = apellido_m;
    }

    public String getGenero() {
        return genero;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }
    
    public String saludoPersona(){
        arregloNombre arreglo = new arregloNombre();
        String mensaje2;
        mensaje2 = "Ingrese todos los campos por favor";
        if(this.nombre.equals("") || this.apellido_p.equals("") || this.apellido_m.equals("")){
            return mensaje2;
        }
        String nombreArr = arreglo.nombres(this.nombre);
        String apellidopArr = arreglo.nombres(this.apellido_p);
        String apellidomArr = arreglo.nombres(this.apellido_m);
        
        String mensaje;
        mensaje = nombreArr + " " + apellidopArr + " " + apellidomArr;
        return mensaje;

    }

	public static String persona(String nombre2, String apellido_p2, String apellido_m2, String genero2) {
		// TODO Auto-generated method stub
		return null;
	}  
}
