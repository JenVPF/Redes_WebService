/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Clases;

/**
 *
 * @author EstebanPC
 */
public class Validacion_Rut {
    String rut;

    public Validacion_Rut(String rut) {
        this.rut = rut;
    }

    public String getRut() {
        return rut;
    }

    public void setRut(String rut) {
        this.rut = rut;
    }
    
    public Boolean Validar(){
        Boolean devuelve = false;
        int ult = this.rut.length();
        int largo = this.rut.length()-3;
        int cte = 2;
        int suma = 0;
        String guion = this.rut.substring(ult-2,ult-1);
        int digito;
        
        for(int i = largo; i>=0 ; i--){
            suma = suma + Integer.parseInt(this.rut.substring(i,i+1))* cte;
            cte += 1;
            if(cte == 8){
                cte = 2;                                        
            }
        }
        String ultimo = this.rut.substring(ult - 1).toUpperCase();
        digito = 11 - (suma%11);
        if(guion.equals("-")){
            if(digito == 10  &&  ultimo.equals("K")){
                devuelve = true;
            }
            else{
                if(digito == 1 && ultimo.equals("0")){
                devuelve = true;
                }
                else{
                    if(digito == Integer.parseInt(ultimo)){
                        devuelve = true;
                    }
                }
            }
            return devuelve;
        }
        else{
            devuelve = false;
            return devuelve;
        }
        
    }
}
