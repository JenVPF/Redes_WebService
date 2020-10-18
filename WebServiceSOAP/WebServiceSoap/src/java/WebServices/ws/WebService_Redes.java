package WebServices.ws;


import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import Clases.Validacion_Rut;
import Clases.Persona;

/**
 *
 * @author EstebanPC
 */
@WebService(serviceName = "WebService_Redes")
public class WebService_Redes {

    /**
     * Web service oparacion -> Verificacion de Rut
     * @param rut
     * @return 
     */
    @WebMethod(operationName = "verificador")
    public String verificador(@WebParam(name = "rut") String rut) {
        Validacion_Rut validacion;
        validacion = new Validacion_Rut(rut);
        if(validacion.Validar()==true){
            String mensaje;
            mensaje= "Rut ingresado es Válido";
            return mensaje;
        }
        else{
            String mensaje2;
            mensaje2 = "Rut Inválido, intente con un nuevo Rut";
            return mensaje2;
        }    
    }

    /**
     * Web service opracion -> Mensaje de Saludo
     * @param nombre
     * @param apellido_m
     * @param apellido_p
     * @param genero
     * @return 
     */
    @WebMethod(operationName = "saludo")
    public String saludo(@WebParam(name = "nombre") String nombre, 
                         @WebParam(name = "apellido_m") String apellido_m, 
                         @WebParam(name = "apellido_p") String apellido_p, 
                         @WebParam(name = "genero") String genero) {
        Persona persona;
        persona = new Persona(nombre,apellido_p,apellido_m,genero);
        
        if(persona.getGenero().equals("M")){
            return "Sr. " + persona.saludoPersona();
        }
        else{
            return "Sra. " + persona.saludoPersona();
        }
    }
}
