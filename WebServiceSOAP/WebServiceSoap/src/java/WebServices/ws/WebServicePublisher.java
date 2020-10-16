/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WebServices.ws;

import javax.xml.ws.Endpoint;
/**
 *
 * @author EstebanPC
 */
public class WebServicePublisher {
    public static void main(String[] args){
        Endpoint.publish("http://localhost:8080/WebService_Redes", new WebService_Redes());
    }
}
