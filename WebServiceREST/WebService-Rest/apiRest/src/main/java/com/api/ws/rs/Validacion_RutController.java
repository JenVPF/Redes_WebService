package com.api.ws.rs;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
//@RestController(serviceName = "WebService_Redes")
public class Validacion_RutController{

    /**
     * Web service oparacion -> Verificacion de Rut
     * @param rut
     * @return 
     */
	@GetMapping(value = "/verificador")
    public String verificador(@RequestParam(name = "rut") String rut) {
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
     * Web service operacion -> Mensaje de Saludo
     * @param nombre
     * @param apellido_m
     * @param apellido_p
     * @param genero
     * @return 
     */
	@GetMapping(value = "/saludo")
    public String saludo(@RequestParam(name = "nombre") String nombre, 
    					 @RequestParam(name = "apellido_m") String apellido_m, 
                         @RequestParam(name = "apellido_p") String apellido_p, 
                         @RequestParam(name = "genero") String genero,
    					@RequestParam(name = "persona") String persona){
        Persona persona2;
        persona2 = new Persona(nombre,apellido_p,apellido_m,genero, persona);
        
        if(persona2.getGenero().equals("M")){
            return "Sr. " + persona2.saludoPersona();
        }
        else{
            return "Sra. " + persona2.saludoPersona();
        }
    }
}
