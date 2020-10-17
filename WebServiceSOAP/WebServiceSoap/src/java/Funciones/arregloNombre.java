/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Funciones;

/**
 *
 * @author EstebanPC
 */
public class arregloNombre {
    public String nombres(String argumento){
        String nombre_saludo = argumento.toLowerCase();
        char[] caracteres = nombre_saludo.toCharArray();
        caracteres[0] = Character.toUpperCase(caracteres[0]);
        for(int i = 0; i < nombre_saludo.length()-2; i++){
            if(caracteres[i] == ' '){
                caracteres[i+1] = Character.toUpperCase(caracteres[i+1]);
            }
        }
        String nombre_arreglado = new String(caracteres);
        return nombre_arreglado;
    }    
}
