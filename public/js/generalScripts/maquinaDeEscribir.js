//////////////////////////////// ***PARAMETROS*** //////////////////////////////////////////
// Contendor->contenedor que se va a pintar;                                        ///////
// palabras-> array con las palabras que se van a escribir;                         ///////
// cantidadPalabras -> Cantidad de palabras que tiene un array;                     ///////
// intervalo-> velocidad de maquina de escribir;                                    ///////
// cantidadRutina-> Cantidad de veces que se repite (0 para repetir infinitamente); ///////
///////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){

    var listaTexto = ["procesos lentos    ", "costos altos    ", "malos serviciós    ", "colas eternas    ", "tiempos de espera    "]  
    maquinaLista("typer",100,listaTexto,0);
    
    function maquinaLista(contenedor, intervalo, listaTexto, indice){      
      if (indice == listaTexto.length){
          indice = 0;
      }
       maquina2(contenedor, listaTexto[indice], intervalo, listaTexto, indice);	
    }
    
    function maquina2(contenedor, texto, intervalo, listaTexto, indiceLista){
    var indiceTexto = 0;
    var finalTexto = false;
    timer = setInterval(function(){			  
      if (indiceTexto == texto.length && finalTexto == false){
          finalTexto = true;
          			
      }
              
      if (finalTexto == false) indiceTexto++
      else indiceTexto--;
      mostrarEliminarTexto(contenedor, texto, indiceTexto, finalTexto);
      if (finalTexto == true && indiceTexto == 0){
          clearInterval(timer);
          maquinaLista(contenedor, intervalo, listaTexto, indiceLista+1);
      }		
    },intervalo)
    }	 
    
    function mostrarEliminarTexto(contenedor, texto, i, finalTexto){  
  if (finalTexto){
      $("#"+contenedor).html(texto.substr(0,i--) + "<span class='marcadorBorrado'>|</span>");
  }
  else{
      $("#"+contenedor).html(texto.substr(0,i++) + "<span class='marcadorBorrado'>|</span>");
  }     
    }
});