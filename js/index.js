window.onLoad=precarga();

function precarga(){
	setTimeout(function(){
		$(".mensaje").text("Casi listo...");
	},2000);
}

function animaciones(){
	$(".pantalla-carga").fadeOut(500);
	document.getElementById("logo").style.transform="translateY(0px)";
	var height=$(".img-producto").height()-100;
	$(".detalle-producto").css("height",height);
	setTimeout('efectoTexto1()',2000);
	setInterval('ocultarTexto()',10000);
}

function ocultarTexto(){
	document.getElementById("texto1").style.opacity="0";
	document.getElementById("texto2").style.opacity="0";
	document.getElementById("texto3").style.opacity="0";
	document.getElementById("texto1").style.transform="translateX(100px)";
	document.getElementById("texto2").style.transform="translateX(100px)";
	document.getElementById("texto3").style.transform="translateX(100px)";
	setTimeout('efectoTexto1()',1000);
}

function efectoTexto1(){
	document.getElementById("texto1").style.transform="translateX(0px)";
	document.getElementById("texto1").style.opacity="1";
	setTimeout('efectoTexto2()',1000);
}
function efectoTexto2(){
	document.getElementById("texto2").style.transform="translateX(0px)";
	document.getElementById("texto2").style.opacity="1";
	setTimeout('efectoTexto3()',1000);
}
function efectoTexto3(){
	document.getElementById("texto3").style.transform="translateX(0px)";
	document.getElementById("texto3").style.opacity="1";
}

$( "div.cuerpo-main-producto" )
.on( "mouseenter", function() {
    $(".detalle-producto",this).animate({
    	width: "100%"
    },200);
    $("#btn-"+$(".detalle-producto",this)[0].id,this).css("display","block");
})
.on( "mouseleave", function() {
    $(".detalle-producto",this).animate({
    	width: "0%"
    },200);
    $("#btn-"+$(".detalle-producto",this)[0].id,this).css("display","none");
});

$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll!=0) {
		$(".nav-main").css("position","fixed");
	}else{
		$(".nav-main").css("position","relative");
	}
});

