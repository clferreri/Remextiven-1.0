$(document).ready(function(){

    $("#validationMail").hide();
    $("#validationPass").hide();
    $("#validationRS").hide();
    $("#validationFantasyName").hide();
    $("#validationIT").hide();
    $("#validationFJ").hide();
    $("#validationAddress").hide();
    $("#validationAddressNumber").hide();
    $("#validationPhone").hide();

    // Si la casilla mail se deselecciona validamos tod
    $("#txtMail").blur(function(){
      var mail = $("#txtMail").val();
      if(mail.length == 0){
        $("#pValidationMail").text("Debe ingresar un mail");
        $("#validationMail").slideDown( 500 );   
      }
      else{
        if(!validarMail(mail)){
            $("#pValidationMail").text("Debe ingresar un mail valido");
            $("#validationMail").slideDown( 500 );    
          }
        else{
            $("#validationMail").slideUp();          
        }
      }

    });


    $("#txtPass").keyup(function(){
      var pass = $("#txtPass").val();
      var pass2 = $("#txtPass2").val();
      
      if(pass != pass2){
        $("#pValidationPass").text("Las contraseñas no coinciden");
        $("#validationPass").slideDown( 500 );

        $("#txtPass").removeClass("inputOk");
        $("#txtPass2").removeClass("inputOk");

        $("#txtPass").addClass("inputError"); 
        $("#txtPass2").addClass("inputError");
         
      }
      else{
          if(!validarPass(pass) || !validarPass(pass2)){
            $("#pValidationPass").text("La contraseña debe 8 caracteres entre alfabeticos y numericos");
            $("#validationPass").slideDown( 500 );  
        
            $("#txtPass").removeClass("inputOk");
            $("#txtPass2").removeClass("inputOk");

            $("#txtPass").addClass("inputError"); 
            $("#txtPass2").addClass("inputError");
          }

          else{
            $("#validationPass").slideUp();  
          
            $("#txtPass").removeClass("inputError");
            $("#txtPass2").removeClass("inputError"); 

            $("#txtPass").addClass("inputOk"); 
            $("#txtPass2").addClass("inputOk");
          }

                   
      }
    });

    $("#txtPass").blur(function(){
      var pass = $("#txtPass").val();
      var pass2 = $("#txtPass2").val();
      
      if(pass != pass2){
        $("#pValidationPass").text("Las contraseñas no coinciden");
        $("#validationPass").slideDown( 500 );

        $("#txtPass").removeClass("inputOk");
        $("#txtPass2").removeClass("inputOk");

        $("#txtPass").addClass("inputError"); 
        $("#txtPass2").addClass("inputError");
         
      }
      else{
          if(!validarPass(pass) || !validarPass(pass2)){
            $("#pValidationPass").text("La contraseña debe 8 caracteres entre alfabeticos y numericos");
            $("#validationPass").slideDown( 500 );  
        
            $("#txtPass").removeClass("inputOk");
            $("#txtPass2").removeClass("inputOk");

            $("#txtPass").addClass("inputError"); 
            $("#txtPass2").addClass("inputError");
          }

          else{
            $("#validationPass").slideUp();  
          
            $("#txtPass").removeClass("inputError");
            $("#txtPass2").removeClass("inputError"); 

            $("#txtPass").addClass("inputOk"); 
            $("#txtPass2").addClass("inputOk");
          }

                   
      }
    });


    $("#txtPass2").keyup(function(){
      var pass = $("#txtPass").val();
      var pass2 = $("#txtPass2").val();
      
      if(pass != pass2){
        $("#pValidationPass").text("Las contraseñas no coinciden");
        $("#validationPass").slideDown( 500 );  
        
        $("#txtPass").removeClass("inputOk");
        $("#txtPass2").removeClass("inputOk");

        $("#txtPass").addClass("inputError"); 
        $("#txtPass2").addClass("inputError");
      }
      else{
          if(!validarPass(pass) || !validarPass(pass2)){
            $("#pValidationPass").text("Debe ser de 8 caracteres y contener letras y numeros");
            $("#validationPass").slideDown( 500 );  
        
            $("#txtPass").removeClass("inputOk");
            $("#txtPass2").removeClass("inputOk");

            $("#txtPass").addClass("inputError"); 
            $("#txtPass2").addClass("inputError");
          }

          else{
            $("#validationPass").slideUp();  
          
            $("#txtPass").removeClass("inputError");
            $("#txtPass2").removeClass("inputError"); 

            $("#txtPass").addClass("inputOk"); 
            $("#txtPass2").addClass("inputOk");
          }
      }
    });

    $("#txtPass2").blur(function(){
      var pass = $("#txtPass").val();
      var pass2 = $("#txtPass2").val();
      
      if(pass != pass2){
        $("#pValidationPass").text("Las contraseñas no coinciden");
        $("#validationPass").slideDown( 500 );

        $("#txtPass").removeClass("inputOk");
        $("#txtPass2").removeClass("inputOk");

        $("#txtPass").addClass("inputError"); 
        $("#txtPass2").addClass("inputError");
         
      }
      else{
          if(!validarPass(pass) || !validarPass(pass2)){
            $("#pValidationPass").text("La contraseña debe 8 caracteres entre alfabeticos y numericos");
            $("#validationPass").slideDown( 500 );  
        
            $("#txtPass").removeClass("inputOk");
            $("#txtPass2").removeClass("inputOk");

            $("#txtPass").addClass("inputError"); 
            $("#txtPass2").addClass("inputError");
          }

          else{
            $("#validationPass").slideUp();  
          
            $("#txtPass").removeClass("inputError");
            $("#txtPass2").removeClass("inputError"); 

            $("#txtPass").addClass("inputOk"); 
            $("#txtPass2").addClass("inputOk");
          }

                   
      }
    });



    $("#txtRS").blur(function(){
      var rs = $("#txtRS").val();
      if(rs.length == 0){
        $("#pValidationRS").text("Debe ingresar la Razon Social");
        $("#validationRS").slideDown( 500 );   
      }
      else{
            $("#validationRS").slideUp();
        }
    });


    $("#txtFantasyName").blur(function(){
      var apellido = $("#txtFantasyName").val();
      if(apellido.length == 0){
        $("#pValidationFantasyName").text("Ingrese el Nombre de Fantasia");
        $("#validationFantasyName").slideDown( 500 );   
      }
      else{
            $("#validationFantasyName").slideUp();
        }
    });

    $("#txtIT").blur(function(){
      var apellido = $("#txtIT").val();
      if(apellido.length == 0){
        $("#pValidationIT").text("Debe ingresar su N° de IT");
        $("#validationIT").slideDown( 500 );   
      }
      else{
            $("#validationSurname2").slideUp();
        }
    });


    $("#txtAddress").blur(function(){
      var direccion = $("#txtAddress").val();
      if(direccion.length == 0){
        $("#pValidationAddress").text("Debe ingresar su dirección");
        $("#validationAddress").slideDown( 500 );   
      }
      else{
        if(direccion.length < 7){
          $("#pValidationAddress").text("Direccion invalida");
          $("#validationAddress").slideDown( 500 );   
        }
        else{
          $("#validationAddress").slideUp();
        }
           
        }
    });

    $("#txtAddressNumber").blur(function(){
      var numeroPuerta = $("#txtAddressNumber").val();
      if(numeroPuerta.length == 0){
        $("#pValidationAddressNumber").text("Debe ingresar el numero de puerta");
        $("#validationAddressNumber").slideDown( 500 );   
      }
      else{
        if(numeroPuerta.length <= 2){
          $("#pValidationAddressNumber").text("Numero invalido");
          $("#validationAddressNumber").slideDown( 500 );   
        }
        else{
          $("#validationAddressNumber").slideUp();
        }
           
        }
    });

    $("#txtPhone").blur(function(){
      var numeroPuerta = $("#txtPhone").val();
      if(numeroPuerta.length == 0){
        $("#pValidationPhone").text("Debe ingresar un telefono");
        $("#validationPhone").slideDown( 500 );   
      }
      else{
        if(numeroPuerta.length <= 6){
          $("#pValidationPhone").text("Numero invalido");
          $("#validationPhone").slideDown( 500 );   
        }
        else{
          $("#validationPhone").slideUp();
        }
           
        }
    });

  });


  function validarInputs(){
    var sendForm = true;
    var errors = [];
    var mail = $("#txtMail").val();
    var pass = $("#txtPass").val();
    var pass2 = $("#txtPass2").val();
    var rs = $("#txtRS").val();
    var fantasyName = $("#txtFantasyName").val();
    var it = $("#txtIT").val();
    var address = $("#txtAddress").val();
    var addressNumber = $("#txtAddressNumber").val();
    var phone = $("#txtPhone").val();

    if(mail.length == 0){
      $("#pValidationMail").text("Debe ingresar un mail");
      $("#validationMail").slideDown( 500 );  
      sendForm = false;
      errors.push("Debe ingresar un correo electronico");
    }
    else{
      if(!validarMail(mail)){
          $("#pValidationMail").text("Debe ingresar un mail válido");
          $("#validationMail").slideDown( 500 );   
          sendForm = false; 
          errors.push("Debe ingresar un email válido");
      }
    }
    


    if(pass != pass2){
      $("#pValidationPass").text("Las contraseñas no coinciden");
      $("#validationPass").slideDown( 500 );     
      sendForm = false;
      errors.push("Las contraseñas no coinciden.");
    }
    else{
        if(!validarPass(pass) || !validarPass(pass2)){
          $("#pValidationPass").text("La contraseña debe 8 caracteres entre alfabeticos y numericos");
          $("#validationPass").slideDown( 500 );  
          sendForm = false; 
          errors.push("La contraseña debe tener 8 caracteres alfabéticos y númericos.");
        }    
    }

    if(rs.length == 0){
      $("#pValidationName").text("Debe ingresar la Razon Social");
      $("#validationName").slideDown( 500 );
      sendForm = false; 
      errors.push("Agregue la Razon Social");  
    }
    else if (!textoSoloLetras(rs)){
      $("#pValidationName").text("Ingrese una razon social válida");
      $("#validationName").slideDown( 500 );
      sendForm = false; 
      errors.push("La Razon social no puede contener numeros o caracteres especiales.");

    }

    if(fantasyName.length == 0){
      $("#pValidationName").text("Debe ingresar el nombre de fantasia");
      $("#validationName").slideDown( 500 );
      sendForm = false; 
      errors.push("Debe ingresar el nombre de fantasia.");  
    }
    else if (!textoSoloLetras(fantasyName)){
      $("#pValidationName").text("Ingrese un nombre de fantasia válido");
      $("#validationName").slideDown( 500 );
      sendForm = false; 
      errors.push("El nombre de fantasia no puede contener numeros ni caracteres especiales.");

    }

    if(it.length == 0){
      $("#pValidationName").text("Debe ingresar su N° de IT");
      $("#validationName").slideDown( 500 );
      sendForm = false; 
      errors.push("Debe ingresar su numero de Identificacion Tributaria.");  
    }
    else if (!textoSoloNumeros(it)){
      $("#pValidationName").text("Ingrese un IT valido");
      $("#validationName").slideDown( 500 );
      sendForm = false; 
      errors.push("El N° de IT debe contener unicamente numeros.");
    }

    if(address.length < 4){
      sendForm = false;
      $("#pValidationAddress").text("Dirección Invalida");
      $("#validationAddress").slideDown( 500 ); 
      errors.push("Debe ingresar una direccion válida.");
    }

    if(phone.length < 5){
      sendForm = false; 
      errors.push("Debe ingresar un telefono válido"); 
    }

    if (!sendForm){
      var html ="<ul>"
      for (var i = 0; i < errors.length; i++){
        html +="<li>" + errors[i] +"</li>"
      }
      html += "</ul>"
      $("#errores").html(html);
      $("#exampleModalCenter").modal();
    }

      return sendForm;  
  }


  function mostrarContraseña(item, imagen){
    var tipo = document.getElementById(item);
    if(tipo.type == "password"){
          tipo.type = "text";
          $("#"+imagen).attr("src","img/icons/smallIcons/eye-open.png");
      }else{       
          tipo.type = "password";
          $("#"+imagen).attr("src","img/icons/smallIcons/eye-close.png");        
      }
  }