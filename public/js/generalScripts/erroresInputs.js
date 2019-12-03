function validarInputTexto(){
    var objInput = $(this)
    var texto = objInput.val();
    var id =  objInput.attr("id");
    if(isNaN(texto)){
        $("#validation" + id).slideUp(); 
        $(objInput).removeClass("is-invalid");
    }
    else{
        $("#pValidation" + id).text("Debe ingresar texto");
        $("#validation" + id).slideDown(600);
        $(objInput).addClass("is-invalid"); 
    }
}

function validarInputNumero(){
    var objInput = $(this)
    var texto = objInput.val();
    var id =  objInput.attr("id");
    if(isNaN(texto)){
        $("#pValidation" + id).text("Solo se aceptan numeros");
        $("#validation" + id).slideDown(600);
        $(objInput).addClass("is-invalid");
    }
    else{
        $("#validation" + id).slideUp(); 
        $(objInput).removeClass("is-invalid");
    }
}


function validarInputTextoYNoVacio(){
    var objInput = $(this)
    var texto = objInput.val();
    var id =  objInput.attr("id");
    if(isNaN(texto)){
        $("#validation" + id).slideUp(); 
        $(objInput).removeClass("is-invalid");
    }
    else if(texto == ""){
        $("#pValidation" + id).text("Este campo no puede estar vacio");
        $("#validation" + id).slideDown(600);
        $(objInput).addClass("is-invalid"); 
    }
    else{
        $("#pValidation" + id).text("Debe ingresar texto");
        $("#validation" + id).slideDown(600);
        $(objInput).addClass("is-invalid"); 
    }
}


function validarInputNumeroYNoVacio(){
    var objInput = $(this)
    var texto = objInput.val();
    var id =  objInput.attr("id");
    if(isNaN(texto)){
        $("#pValidation" + id).text("Solo se aceptan numeros");
        $("#validation" + id).slideDown(600);
        $(objInput).addClass("is-invalid");
    }
    else if (texto == ""){
        $("#pValidation" + id).text("Este campo no puede estar vacio");
        $("#validation" + id).slideDown(600);
        $(objInput).addClass("is-invalid"); 
    }
    else{
        $("#validation" + id).slideUp(); 
        $(objInput).removeClass("is-invalid");
    }
}