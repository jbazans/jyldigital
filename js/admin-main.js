function ajustar() {	
	if (document.documentElement.clientWidth>500) {		
		$(".panel-lateral").css("height",document.documentElement.clientHeight);
	}
}

var idProducto="";

function ajuste_editar(id){
	idProducto=id;
	if (document.documentElement.clientWidth>500) {		
		$(".panel-lateral").css("height",document.documentElement.clientHeight);
	}
	$.ajax({
		type:'POST',
		url:'../recursos/getProducto.php',
		data:{
			id:id
		},
		success: function(data){
			var producto=JSON.parse(data);
			document.getElementById("nombre").value=producto[0]["pro_nombre"];
			var descripcion=producto[0]["pro_descripcion"];
			var palabra="";
			for (var i=0; i<descripcion.length ; i++) {
				if (descripcion[i]==',') {
					document.getElementById("desc"+numero).value=palabra;
					add_campo();
					palabra="";
				}else{
					palabra+=descripcion[i];
				}
			}
			document.getElementById("desc"+numero).value=palabra;
			document.getElementById("pre_web").value=producto[0]["pro_precio_web"];
			document.getElementById("pre_tienda").value=producto[0]["pro_precio_tienda"];
			document.getElementById("url1").value=producto[0]["pro_img1"];
			document.getElementById("url2").value=producto[0]["pro_img2"];
			document.getElementById("url3").value=producto[0]["pro_img3"];
			document.getElementById("img1").src="../"+producto[0]["pro_img1"];
			document.getElementById("img2").src="../"+producto[0]["pro_img2"];
			document.getElementById("img3").src="../"+producto[0]["pro_img3"];
			document.getElementById("estado").value=producto[0]["pro_estado"];
			document.getElementById("categoria").value=producto[0]["pro_cat_bus"];
			document.getElementById("oferta").value=producto[0]["pro_oferta"];
			document.getElementById("sonido").value=producto[0]["pro_sonido"];
		}
	});
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
	var cat_bus;
	if (document.getElementById("categoria").value=="Sublimaci&oacute;n") {
		cat_bus="Sublimacion";
	}else{
		if (document.getElementById("categoria").value=="Gigantograf&iacute;a") {
			cat_bus="Gigantografia";
		}else{
			cat_bus=document.getElementById("categoria").value;
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
			cat_bus:cat_bus,
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

function modificar_producto(){
	//$(".pantalla-carga").fadeIn(200);	
	var cat="";
	if (document.getElementById("categoria").value=="Sublimacion") {
		cat="Sublimaci&oacute;n";
	}else{
		if (document.getElementById("categoria").value=="Gigantografia") {
			cat="Gigantograf&iacute;a";
		}else{
			cat=document.getElementById("categoria").value;
		}
	}
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
		url:'../recursos/editarProducto.php',
		data:{			
			id:idProducto,
			nombre:document.getElementById("nombre").value,
			descripcion:descOrden,
			pre_web:document.getElementById("pre_web").value,
			pre_tienda:document.getElementById("pre_tienda").value,
			url1:document.getElementById("url1").value,
			url2:document.getElementById("url2").value,
			url3:document.getElementById("url3").value,
			estado:document.getElementById("estado").value,
			categoria:cat,
			cat_bus:document.getElementById("categoria").value,
			oferta:document.getElementById("oferta").value,
			sonido:document.getElementById("sonido").value
		},
		success:function(data){
			alert(data);
			$(".pantalla-carga").fadeOut(200);
			document.getElementById("path1").value=document.getElementById("url1").value;
			document.getElementById("path2").value=document.getElementById("url2").value;
			document.getElementById("path3").value=document.getElementById("url3").value;
			$("#btn1").click();
		}
	});
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