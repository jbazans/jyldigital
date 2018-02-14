window.onLoad=precarga();

function precarga(){	
	$("#galeria").addClass("nav-contenido-activo");
	setTimeout(function(){
		$(".mensaje").text("Casi listo...");
	},2000);
}

function animaciones(categoria){
	$(".pantalla-carga").fadeOut(500);
	document.getElementById("logo").style.transform="translateY(0px)";
	$(".contenido-linea").css("height",$(".fila-galeria").height());
}

$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll!=0) {
		$(".nav-main").css("position","fixed");
	}else{
		$(".nav-main").css("position","relative");
	}
});