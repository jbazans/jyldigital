window.onLoad=precarga();

function precarga(){	
	$("#galeria").addClass("nav-contenido-activo");
	$("#selector-galeria").addClass("selector-activo");
	setTimeout(function(){
		$(".mensaje").text("Casi listo...");
	},2000);
}

function animaciones(categoria){
	$(".pantalla-carga").fadeOut(500);
	document.getElementById("logo").style.transform="translateY(0px)";
	if (document.documentElement.clientWidth>500) {
		$(".contenido-linea").css("height",$(".fila-galeria").height());
	}	
}

$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll!=0) {
		$(".nav-main").css("position","fixed");
	}else{
		$(".nav-main").css("position","relative");
	}
});

function mostrar_menu(){
	$(".opciones-movil").animate({
		height:'toggle'
	});
}

$("div.nav-contenido").on('mouseenter',function(){
	$("#selector-"+this.id).css("background","rgb(8,8,150)");
}).on('mouseleave',function(){
	if (this.id!="galeria") {
        $("#selector-"+this.id).css("background","rgb(255,255,255)");
    }  
});