function ajustar() {	
	$(".sugerencia").css("top",$("#descripcion").position().top+25);
	$(".sugerencia").css("left",$("#descripcion").position().left);
	$(".panel-lateral").css("height",document.documentElement.clientHeight);
}

function guardar_producto(){
	$(".pantalla-carga").fadeIn(200);	
	$.ajax({
		type:'POST',
		url:'../recursos/guardarProducto.php',
		data:{
			nombre:document.getElementById("nombre").value,
			descripcion:document.getElementById("descripcion").value,
			pre_web:document.getElementById("pre_web").value,
			pre_tienda:document.getElementById("pre_tienda").value,
			url:document.getElementById("url").value,
			estado:document.getElementById("estado").value,
			categoria:document.getElementById("categoria").value,
			oferta:document.getElementById("oferta").value,
			sonido:document.getElementById("sonido").value
		},
		success:function(data){
			alert(data);
			$(".pantalla-carga").fadeOut(200);
		}
	});
	document.getElementById("path").value=document.getElementById("url").value;
	$("#btn1").click();
}
var id;
function add_descripcion(idc){
	id=idc;
	$(".pantalla-sugerencia").fadeIn(200);
}

$(".btn-insertar").click(function(){
	document.getElementById(id).value+="&";
	document.getElementById(id).value+=document.getElementById("sug").value;
	$(".pantalla-sugerencia").fadeOut(200);
	document.getElementById(id).value+=";";
});
$(".btn-cancelar").click(function(){
	$(".pantalla-sugerencia").fadeOut(200);
});

function readFile(input,iden) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 		reader.onload = function (e) {
 			$("#"+iden).attr("src",e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(".img-imagen").click(function(){
	var iden="asd";
	var element="";
	if (this.id=="img1") {
		iden="img1";
		element="imagen1";
	}else{
		if (this.id=="img2") {
			iden="img2";
			element="imagen2";
		}else{
			iden="img3";
			element="imagen3";
		}
	}
	var input=document.getElementById(element);
	input.click();		
	input.onchange = function (e) {
	    readFile(e.srcElement,iden);
	}
});
