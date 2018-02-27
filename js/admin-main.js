function ajustar() {	
	$(".panel-lateral").css("height",document.documentElement.clientHeight);
}

function guardar_producto(){
	$(".pantalla-carga").fadeIn(200);	
	var arrayDesc=document.getElementsByClassName("descripcion");	
	var descOrden="";
	var cont=0;
	for (var i =0; i < arrayDesc.length ; i++) {
		if(arrayDesc[i].value!=""){
			cont++;			
			if (cont==1) {
				descOrden+=arrayDesc[i].value;
			}else{
				descOrden+=","+arrayDesc[i].value;
			}
		}
	}
	$.ajax({
		type:'POST',
		url:'../recursos/guardarProducto.php',
		data:{
			nombre:document.getElementById("nombre").value,
			descripcion:descOrden,
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

var numero=1;
function add_campo(){
	numero++;
	$(".fila-add").append(
	'<div class="input-texto" id="espacios"><div class="lado-input">'+
		'<input type="text" class="descripcion" id="desc'+numero+'" placeholder="Descripci&oacute;n '+numero+'">'+
	'</div>'+
	'<div class="botones-funcion">'+
		'<button class="btn-add" onclick="add_descripcion(\'desc'+numero+'\')"><i class="fa fa-tag" aria-hidden="true"></i></button>'+
	'</div></div>'
	);
	$(".panel-lateral").css("height",document.documentElement.clientHeight);
}