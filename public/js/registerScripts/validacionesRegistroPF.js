$(document).ready(function(){

    $("#validationMail").hide();
    $("#validationPass").hide();
    $("#validationName").hide();
    $("#validationSurname").hide();
    $("#validationSurname2").hide();
    $("#validationDni").hide();
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



    $("#txtName").blur(function(){
      var nombre = $("#txtName").val();
      if(nombre.length == 0){
        $("#pValidationName").text("Debe ingresar su nombre");
        $("#validationName").slideDown( 500 );   
      }
      else{
            $("#validationName").slideUp();
        }
    });


    $("#txtSurname").blur(function(){
      var apellido = $("#txtSurname").val();
      if(apellido.length == 0){
        $("#pValidationSurname").text("Debe ingresar su apellido");
        $("#validationSurname").slideDown( 500 );   
      }
      else{
            $("#validationSurname").slideUp();
        }
    });

    $("#txtSurname2").blur(function(){
      var apellido = $("#txtSurname2").val();
      if(apellido.length == 0){
        $("#pValidationSurname2").text("Debe ingresar su apellido");
        $("#validationSurname2").slideDown( 500 );   
      }
      else{
            $("#validationSurname2").slideUp();
        }
    });

    $("#txtDni").blur(function(){
      var documento = $("#txtDni").val();
      if(documento.length == 0){
        $("#pValidationDni").text("Debe ingresar un documento");
        $("#validationDni").slideDown( 500 );   
      }
      else{
        if(documento.length <= 7){
          $("#pValidationDni").text("Documento invalido");
          $("#validationDni").slideDown( 500 );   
        }
        else{
          $("#validationDni").slideUp();
        }
           
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
    var name = $("#txtName").val();
    var surname = $("#txtSurname").val();
    var surname2 = $("#txtSurname2").val();
    var dni = $("#txtDni").val();
    var birthDate = $("#dtpBirthDate").val();
    var address = $("#txtAddress").val();
    var addressNumber = $("#txtAddressNumber").val();
    var phone = $("#txtPhone").val();

    if(mail.length == 0){
      $("#pValidationMail").text("Debe ingresar un mail");
      $("#validationMail").slideDown( 500 );  
      sendForm = false;
      errors.push("Debe ingresar un correo electronico.");
    }
    else{
      if(!validarMail(mail)){
          $("#pValidationMail").text("Debe ingresar un mail válido");
          $("#validationMail").slideDown( 500 );   
          sendForm = false; 
          errors.push("Debe ingresar un email válido.");
      }
    }
    


    if(pass != pass2){
      $("#pValidationPass").text("Las contraseñas no coinciden");
      $("#validationPass").slideDown( 500 );     
      sendForm = false;
      errors.push("Las contraseñas no coinciden");
    }
    else{
        if(!validarPass(pass) || !validarPass(pass2)){
          $("#pValidationPass").text("La contraseña debe 8 caracteres entre alfabeticos y numericos");
          $("#validationPass").slideDown( 500 );  
          sendForm = false; 
          errors.push("La contraseña debe tener 8 caracteres alfabéticos y númericos.");
        }    
    }

    if(name.length == 0){
      $("#pValidationName").text("Debe ingresar su nombre");
      $("#validationName").slideDown( 500 );
      sendForm = false; 
      errors.push("Debe ingresar su nombre.");  
    }
    else if (!textoSoloLetras(name)){
      $("#pValidationName").text("Ingrese un nombre válido");
      $("#validationName").slideDown( 500 );
      sendForm = false; 
      errors.push("El nombre no puede contener números, especiales o tildes");

    }

    if(surname.length == 0){
      $("#pValidationSurname").text("Debe ingresar su apellido");
      $("#validationSurname").slideDown( 500 );
      sendForm = false; 
      errors.push("Debe ingresar su apellido.");  
    }
    else if (!textoSoloLetras(surname)){
      $("#pValidationSurname").text("Ingrese un apellido válido");
      $("#validationSurname").slideDown( 500 );
      sendForm = false; 
      errors.push("El primer apellido no puede contener números, caracteres especiales o tildes.");

    }

    if(surname2.length == 0){
      $("#pValidationSurname2").text("Debe ingresar su apellido");
      $("#validationSurname2").slideDown( 500 );
      sendForm = false; 
      errors.push("Debe ingresar su apellido");  
    }
    else if (!textoSoloLetras(surname2)){
      $("#pValidationSurname2").text("Ingrese un apellido válido");
      $("#validationSurname2").slideDown( 500 );
      sendForm = false; 
      errors.push("El segundo apellido no puede contener números, caracteres especiales o tildes.");
    }

    if(dni.length == 0){
      $("#pValidationDni").text("Debe ingresar un documento");
      $("#validationDni").slideDown( 500 );   
      sendForm = false; 
      errors.push("Debe ingresar un documento.");
    }
    else{
      if(dni.length <= 7){
        $("#pValidationDni").text("Documento invalido");
        $("#validationDni").slideDown( 500 );  
        sendForm = false; 
       errors.push("El documento ingresado no es válido."); 
      }         
    }


    if(!mayorDeEdad(birthDate)){
      sendForm = false; 
      errors.push("Debes ser mayor de edad para registrarte."); 
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