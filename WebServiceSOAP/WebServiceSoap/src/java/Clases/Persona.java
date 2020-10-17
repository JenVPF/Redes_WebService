package Clases;

import Funciones.arregloNombre;
/**
 *
 * @author EstebanPC
 */
public class Persona {
    String nombre;
    String apellido_p;
    String apellido_m;
    String genero;

    public Persona(String nombre, String apellido_p, String apellido_m, String genero) {
        this.nombre = nombre;
        this.apellido_p = apellido_p;
        this.apellido_m = apellido_m;
        this.genero = genero;
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
        
        String nombreArr = arreglo.nombres(this.nombre);
        String apellidopArr = arreglo.nombres(this.apellido_p);
        String apellidomArr = arreglo.nombres(this.apellido_m);
        
        String mensaje;
        mensaje = nombreArr + " " + apellidopArr + " " + apellidomArr;
        return mensaje;

    }  
}
