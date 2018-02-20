window.onLoad=precarga();

function precarga(){	
	$("#productos").addClass("nav-contenido-activo");
	setTimeout(function(){
		$(".mensaje").text("Casi listo...");
	},2000);
}

var cate="";
function animaciones(categoria){
    console.log(categoria);
    cate=categoria;
    $(".fondo-blur").css("filter","blur(0px)");
	$(".pantalla-carga").fadeOut(500);
	document.getElementById("logo").style.transform="translateY(0px)";
    if (categoria!="destacado") {
        $("#"+categoria).addClass("categoria-titulo-activo");
    }    
    if (document.documentElement.clientWidth>500) {
        var height=$(".img-producto-categoria").height()-100;
        $(".detalle-producto").css("height",height);
    }
}

$(".btn-cobertura").click(function(){
	$(".main-cobertura").fadeIn();
	initMap();
});
$(".btn-cerrar").click(function(){
	$(".main-cobertura").fadeOut();
});

$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll!=0) {
		$(".nav-main").css("position","fixed");
	}else{
		$(".nav-main").css("position","relative");
	}
});

function initMap() {
    var centro = {lat: -12.040160710633163, lng: -76.97793484374415};
    var ceres={lat: -12.03193367012095, lng: -76.92666530638235};
    var abancay={lat: -12.054010513502696, lng: -77.03014373837505};
    var image = {
          url: '../img/icono/delivery.png'
    };
    var map;
    if (document.documentElement.clientWidth>500) {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: centro
        });
    }else{
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: centro
        });
    }    

    var marker = new google.maps.Marker({
        position: ceres,
        icon: image,
        map: map,
        title: "Paradero Ceres - Medio",
    });
    var infowindow = new google.maps.InfoWindow({
        content: "Paradero Ceres - Medio<br>"
    });
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });
    var marker2 = new google.maps.Marker({
        position: abancay,
        icon: image,
        map: map,
        title: "Av. Abancay",
    });
     var infowindow2 = new google.maps.InfoWindow({
        content: "En cualquier paradero de la av. Abancay<br>"
    });
    marker2.addListener('click', function() {
        infowindow2.open(map, marker2);
    });
}

$( ".categoria-titulo" )
.on( "mouseenter", function() {
    $("#"+this.id).empty();
    if (this.id=="Tarjetas") {
        $("#"+this.id).append("<i class='fa fa-caret-right' aria-hidden='true'></i> Tarjetas de invitaci&oacute;n");
    }else{
        $("#"+this.id).append("<i class='fa fa-caret-right' aria-hidden='true'></i> "+this.id);
    }
})
.on( "mouseleave", function() {
    $("#"+this.id).empty();
    if (this.id=="Tarjetas") {
        $("#"+this.id).append("Tarjetas de invitaci&oacute;n");
    }else{
        $("#"+this.id).append(this.id);
    }
});

var posicion=0;
function cambiar_imagen_flecha(lado){
    if (lado=='iz') {
        posicion--;
        if (posicion<0) {
            posicion=2;
        }
    }else{
        posicion++;
        if (posicion==3) {
            posicion=0;
        }
    }
    $(".img-producto").attr("src",$(".img-cuadro")[posicion].src);
}

function cambiar_imagen(path,num){
    $(".img-producto").attr("src",path);
    posicion=num;
}

$( "div.producto-recomendado" )
.on( "mouseenter", function() {
    $(".detalle-producto",this).animate({
        width: $(".img-producto-categoria").width()
    },200);
    $("#btn-"+$(".detalle-producto",this)[0].id,this).css("display","block");
    console.log(this);
})
.on( "mouseleave", function() {
    $(".detalle-producto",this).animate({
        width: "0%"
    },200);
    $("#btn-"+$(".detalle-producto",this)[0].id,this).css("display","none");
});

$("#buscar").keypress(function(e){
    var tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        window.location.href='../productos.php?producto='+document.getElementById("buscar").value;
    }
});

function procesar_compra(id){
    var a=document.createElement("a");
    a.setAttribute('href', 'https://www.facebook.com/messages/t/JyLPublimprenta');
    a.setAttribute('target', '_blank');
    a.click();
    /*
    $(".pantalla-compra").fadeIn(200);
    */
}

$(".btn-cancelar").click(function(){
    $(".pantalla-compra").fadeOut(200);
});

function mostrar_menu(){
    $(".opciones-movil").animate({
        height:'toggle'
    });
}

var cat_menu=0;
$(".categorias-menu").click(function(){
    if (cat_menu==0) {
        $(".categorias-menu").empty();
        $(".categorias-menu").append('<i class="fa fa-chevron-up" aria-hidden="true"></i> Categorias');
        cat_menu=1;
    }else{
        $(".categorias-menu").empty();
        $(".categorias-menu").append('<i class="fa fa-chevron-down" aria-hidden="true"></i> Categorias');
        cat_menu=0;
    }
    $(".main-contenido-categorias").animate({
        height:'toggle'
    });
});

$("#select-orden").change(function(){
    var url = "../productos.php";
    if (cate=="destacado") {
        window.location.href=url+"?order="+$("#select-orden").val();
    }else{
        window.location.href=url+"?categoria="+cate+"&order="+$("#select-orden").val();
    }   
});