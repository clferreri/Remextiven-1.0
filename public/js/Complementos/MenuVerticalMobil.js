$(document).ready(function(){

    $(".navbar-toggler, .overlay").click(function(){
        $(".menuMobil" ).toggleClass("open");
    });

    $("#btnCerrarMenu").click(function(){
        $(".menuMobil").toggleClass("open");
    });
});