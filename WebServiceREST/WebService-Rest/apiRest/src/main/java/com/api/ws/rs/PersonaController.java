package com.api.ws.rs;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class PersonaController {
	
	@GetMapping(value = "/nombre")
	public Persona formato(@RequestParam(value = "nombre") String nombre, @RequestParam(value = "apellido_p") String apellido_p, @RequestParam(value = "apellido_m") String apellido_m, @RequestParam(value="genero") String genero){
		String persona;
		persona = Persona.persona(nombre, apellido_p, apellido_m, genero);
		return new Persona(nombre, apellido_p, apellido_m, genero, persona);
	}
}