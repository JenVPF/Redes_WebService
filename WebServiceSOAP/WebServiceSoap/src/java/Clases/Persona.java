package Clases;

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
        String mensaje;
        //String nombre_i = this.nombre.substring(0,1).toUpperCase();
        //String nombre_resto = this.nombre.substring(1,this.nombre.length()).toLowerCase();
        String nombre_saludo = this.nombre.toLowerCase();
        char[] caracteres = nombre_saludo.toCharArray();
        caracteres[0] = Character.toUpperCase(caracteres[0]);
        for(int i = 0; i < nombre_saludo.length()-2; i++){
            if(caracteres[i] == ' '){
                caracteres[i+1] = Character.toUpperCase(caracteres[i+1]);
            }
        }
        String nombre_arreglado = new String(caracteres);
        
        String apellidop_i = this.apellido_p.substring(0,1).toUpperCase();
        String apellidop_resto = this.apellido_p.substring(1,this.apellido_p.length()).toLowerCase();
        
        String apellidom_i = this.apellido_m.substring(0,1).toUpperCase();
        String apellidom_resto = this.apellido_m.substring(1,this.apellido_m.length()).toLowerCase();
        
        
        
        mensaje = nombre_arreglado + " " + apellidop_i + apellidop_resto + " " + apellidom_i + apellidom_resto;  
        
        return mensaje;
    }  
}
