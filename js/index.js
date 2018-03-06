window.onLoad=precarga();

function precarga(){
	setTimeout(function(){
		$(".mensaje").text("Casi listo...");
	},2000);
}

function animaciones(){
	$(".fondo-blur").css("filter","blur(0px)");
	$(".pantalla-carga").fadeOut(500);
	var top=$(".img-banner").width()*200/2000;
	$(".textosanimados").css("top",top);	
	document.getElementById("logo").style.transform="translateY(0px)";
	var height=$(".img-producto").height()-100;
	if (document.documentElement.clientWidth>500) {
		$(".detalle-producto").css("height",height);
	}
	var margin=($(".img-banner").width()-document.documentElement.clientWidth)/2;
	$(".img-banner").css("margin-left","-"+margin);
	setTimeout('efectoTexto1()',2000);
	setInterval('ocultarTexto()',10000);
	setTimeout('efectoferta()',2000);
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

function efectoferta(){	
	$(".img-gif-oferta").css("opacity","1");
	$(".img-gif-oferta").animate({
		width:"100%",
		margin:"0%"
	});
	setTimeout('ocultaroferta()',6000);
}

function ocultaroferta(){	
	$(".img-gif-oferta").css("opacity","0");
	$(".img-gif-oferta").animate({
		width:"0%",
		margin:"50%"
	});
	setTimeout('acomodaroferta()',2000);
}

function acomodaroferta(){	
	setTimeout('efectoferta()',1000);
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
	if (document.documentElement.clientWidth>500) {
	    $(".detalle-producto",this).animate({
	    	width: "100%"
	    },200);
	    $("#btn-"+$(".detalle-producto",this)[0].id,this).css("display","block");
	}
})
.on( "mouseleave", function() {
	if (document.documentElement.clientWidth>500) {
	    $(".detalle-producto",this).animate({
	    	width: "0%"
	    },200);
	    $("#btn-"+$(".detalle-producto",this)[0].id,this).css("display","none");
	}
});

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

$(window).resize(function() {
	var ancho=$(".img-banner").width();
	var top=ancho*200/2000;
	$(".textosanimados").css("top",top);
});

$("div.nav-contenido").on('mouseenter',function(){
	$("#selector-"+this.id).css("background","rgb(8,8,150)");
}).on('mouseleave',function(){
	$("#selector-"+this.id).css("background","rgb(255,255,255)");
});

var click_chat=0;
$(".chat-titulo").click(function(){
	$(".chat-titulo").empty();
	if (click_chat==0) {
		$(".chat-titulo").append('<i class="fa fa-angle-down" aria-hidden="true"></i> Consultanos');
		click_chat=1;
	}else{
		$(".chat-titulo").append('<i class="fa fa-angle-up" aria-hidden="true"></i> Consultanos');
		click_chat=0;
	}
	$(".cuerpo-chat-msg").animate({
		height:"toggle"
	});
	document.getElementById("input-texto").focus();
});

var revisar_respuesta;
var mi_ip;
$("#input-texto").keypress(function(e){
    var tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
    	$(".btn-send-msg").click(); 	
    }
});

var timer_respuesta=0;
function enviar_pregunta(){
	var mensaje=document.getElementById("input-texto").value;
    if (mensaje!="") {
		document.getElementById("input-texto").value="";
	    var msg='<div class="respuesta-cliente">'+
	    			'<div class="cliente-linea">'+
	    			mensaje+
	    			'</div></div>';
	    $(".contenido-chat").append(msg);   
	    if (timer_respuesta==0) {
	    	revisar_respuesta=setInterval("ver_respuesta()",2000); 
	    	timer_respuesta++;
	    }
	    var objDiv = document.getElementById("chat-online");
		objDiv.scrollTop = objDiv.scrollHeight;	
	    $.ajax({
    		type:'POST',
    		url:'recursos/sendMsgWeb.php',
    		data:{
    			msg:mensaje
    		},
    		success:function(data){    			
    			var data_resp=JSON.parse(data);
    			mi_ip=data_resp[1]; 	
    		}
    	});
	}
}

function ver_respuesta(){
	$.ajax({
    	type:'POST',
    	url:'recursos/getRespuesta.php',
    	data:{
    		ip:mi_ip
    	},
    	success:function(data){
    		if (data!="No hay respuesta.") {
    			var msg='<div class="respuesta-web">'+
		    		'<div class="web-linea">'+
		    		data+
		    		'</div></div>';
			    $(".contenido-chat").append(msg);
			    var objDiv = document.getElementById("chat-online");
				objDiv.scrollTop = objDiv.scrollHeight;	
    		}    		
    	}
    });	
}