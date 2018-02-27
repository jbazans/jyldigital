window.onLoad=precarga();

function precarga(){
    $("#selector-contactanos").addClass("selector-activo");
	setTimeout(function(){
		$(".mensaje").text("Casi listo...");
	},2000);
}
var alt_form_con;
function animaciones(){
    $(".fondo-blur").css("filter","blur(0px)");
	$(".pantalla-carga").fadeOut(500);
	document.getElementById("logo").style.transform="translateY(0px)";

    var ancho_titulo=$(".img-con-top").width();
    $(".contenido-img-titulo").css("top",ancho_titulo*100/2000);

    var ancho=$(".img-con-bottom").width();
    $(".form-contactanos").css("top",ancho_titulo*120/2000);

    $(".form-contactanos").css("top",top);
    alt_form_con=$("#form-contacto").position().top;
     $(".img-con-titulo").css("transform","rotate3d(1,0,0,0deg)");
}

$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll!=0) {
		$(".nav-main").css("position","fixed");
	}else{
		$(".nav-main").css("position","relative");
	}
    if (alt_form_con<scroll+window.innerHeight) {
        $(".img-cotizacion").css("transform","translateX(0px)");
    }
});

function initMap() {
    var jyl = {lat: -11.986473729249896, lng: -76.94019317685161};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: jyl
    });
    var icono={
          url: 'img/icono/icono-mini.png'
    };
    var marker = new google.maps.Marker({
        position: jyl,
        map: map,
        icon: icono,
        title: "JyL Publimprenta"
    });
}

function sendMail(){
    $(".pantalla-carga").fadeIn(500);
    $(".mensaje").text("Enviando correo...");
    $.ajax({
        type:"GET",
        url:"recursos/enviarMail.php",
        data:{
            nombre:document.getElementById("nombre").value,
            email:document.getElementById("email").value,
            celular:document.getElementById("celular").value,
            asunto:document.getElementById("asunto").value,
            consulta:document.getElementById("consulta").value
        },
        success:function(data){
            if (data=="exito") {
                alert("Correo enviado.");
                document.getElementById("nombre").value="";
                document.getElementById("email").value="";
                document.getElementById("celular").value="";
                document.getElementById("asunto").value="";
                document.getElementById("consulta").value="";
            }else{
                alert("Ocurrio un error, intentelo m&aacute;s tarde.");
            }
            $(".pantalla-carga").fadeOut(500);
        }
    });
}

function mostrar_menu(){
    $(".opciones-movil").animate({
        height:'toggle'
    });
}

$(window).resize(function() {
    var ancho_titulo=$(".img-con-top").width();
    $(".contenido-img-titulo").css("top",ancho_titulo*100/2000);
    var ancho=$(".img-con-bottom").width();
    var top=ancho*120/2000;
    $(".form-contactanos").css("top",top);
    if (ancho<1300) {
        $(".separador-filas").css("height",10);
    }else{
        $(".separador-filas").css("height",20);
    }
});

$("div.nav-contenido").on('mouseenter',function(){
    $("#selector-"+this.id).css("background","rgb(8,8,150)");
}).on('mouseleave',function(){
    if (this.id!="contactanos") {
        $("#selector-"+this.id).css("background","rgb(255,255,255)");
    }  
});