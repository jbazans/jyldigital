window.onLoad=precarga();

function precarga(){
	setTimeout(function(){
		$(".mensaje").text("Casi listo...");
	},2000);
}

function animaciones(){
    $(".fondo-blur").css("filter","blur(0px)");
	$(".pantalla-carga").fadeOut(500);
	document.getElementById("logo").style.transform="translateY(0px)";
    var ancho=$(".img-con-bottom").width();
    var top=ancho*250/2000;
    $(".form-contactanos").css("top",top);
}

$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll!=0) {
		$(".nav-main").css("position","fixed");
	}else{
		$(".nav-main").css("position","relative");
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
    var ancho=$(".img-con-bottom").width();
    var top=ancho*200/2000;
    $(".form-contactanos").css("top",top);
});

