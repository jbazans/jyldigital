function ajustar() {	
	if (document.documentElement.clientWidth>500) {		
		$(".panel-lateral").css("height",document.documentElement.clientHeight);
	}
}

function ajustar_chat() {	
	if (document.documentElement.clientWidth>500) {		
		$(".panel-lateral").css("height",document.documentElement.clientHeight);
	}
	var searchChats=setInterval("buscarChats()",2000);
	$(".lado-activado").css("height",$(".lado-animacion").height());
}

var arrayIpsMainChat=[];
function buscarChats(){
	$.ajax({
		type:'POST',
    	url:'../recursos/getAllAsks.php',
    	data:{
    	},
    	success:function(data){
    		var snd = new Audio("../recursos/sonido/msg-sound.wav");
    		if (data!="No hay respuesta.") {
    			var data_resp=JSON.parse(data);
    			if (arrayIpsMainChat.length==0) {
    				snd.play();
    				arrayIpsMainChat.push(data_resp[0]);
    			}else{
    				var cont_nuevo_ip=0;
    				for (var i = 0; i < arrayIpsMainChat.length; i++) {
    					if (arrayIpsMainChat[i]!=data_resp[0]) {
    						cont_nuevo_ip++;
    					}
    				}
    				if (cont_nuevo_ip>0) {
    					snd.play();
    					arrayIpsMainChat.push(data_resp[0]);
    				}
    			}
    				var id=data_resp[0].replace(".","_");
    				id=id.replace(".","_");
    				id=id.replace(".","_");
    				id=id.replace(":","_");
    				id=id.replace(":","_");    				
    				if ($('#'+id).length) {
					  	$("#"+id).css("display","block");
					} else {
						var html='<div class="separador-chats"></div>';
						html+='<div class="fila-chats">';
						html+='<div class="lado-datos">';
						html+='<div class="client-name"><strong>'+
						data_resp[i]+'</strong></div>';
						html+="";//numero de mensajes
						html+='<div class="client-link">'+
						'<a href="verChat.php?idCli='+data_resp[0]+
						'">Ver chat</a></div>';
						html+='</div>';
						html+='<div class="lado-animacion">';
						html+='<div id="'+id+'" class="lado-activado"'+
						' style="display:block;"></div>';
						html+='</div>';
						html+='</div>';
					  	$(".contenido-panel").append(html);
					}			   
    		}    
    	}
	});
}

var ipCliente;
function ajustar_chat_enlinea(idCliente){
	ipCliente=idCliente;
	if (document.documentElement.clientWidth>500) {		
		$(".panel-lateral").css("height",document.documentElement.clientHeight);
	}
	var searchAsks=setInterval("buscarPreguntas()",2000);
	$(".lado-activado").css("height",$(".lado-animacion").height());
	$(".pantalla-chat").css("height",document.documentElement.clientHeight-125);
	var ventanaChat=document.getElementById("chat-web-online");
	ventanaChat.scrollTop = ventanaChat.scrollHeight;
}

var arrayIps=[];
var cont_agre_ip=0;
function buscarPreguntas(){
	$.ajax({
		type:'POST',
    	url:'../recursos/getPregunta.php',
    	data:{
    		ip:ipCliente
    	},
    	success:function(data){
    		var snd = new Audio("../recursos/sonido/msg-sound.wav");
    		if (data!="No hay pregunta.") {
    			var data_resp=JSON.parse(data);
    			var msg='<div class="fila-mensajes">'+
		    				'<div class="mensaje-ind">'+
		    				data_resp[0]+
		    				'</div>'+
		    				'<div class="mensaje-fecha">('+
		    				data_resp[1]+' - '+data_resp[2]+
		    				')</div>'+
		    			'</div>';
		    	$(".pantalla-chat").append(msg);
		    	var ventanaChat=document.getElementById("chat-web-online");
		    	ventanaChat.scrollTop = ventanaChat.scrollHeight;
  				snd.play();			   
    		}    
    	}
	});
	$.ajax({
		type:'POST',
    	url:'../recursos/getAllAsks.php',
    	data:{
    	},
    	success:function(data){
    		var snd = new Audio("../recursos/sonido/msg-sound.wav");
    		if (data!="No hay respuesta.") {
    			var data_resp=JSON.parse(data);
    			if (data_resp[0]==ipCliente) {
    				if (cont_agre_ip==0) {
    					cont_agre_ip++;
    					arrayIps.push(data_resp[0]);
    				}    				
    			}else{
	    			if (arrayIps.length==0) {
	    				snd.play();	
	    				arrayIps.push(data_resp[0]);
	    				$(".aviso-mensaje").fadeIn(500);
	    			}else{
	    				var cont_ips=0;
	    				for (var i = 0; i < arrayIps.length; i++) {
		    				if(data_resp[0]!=arrayIps[i]){	    					  			
	  							cont_ips++;
		    				}
		    			}
		    			if (cont_ips>0) {
		    				snd.play();	
		    				$(".aviso-mensaje").fadeIn(500);
	  						arrayIps.push(data_resp[0]);
		    			}
	    			}	
    			}   
    		}     
    	}
	});
}

function cerrar_aviso(){
	$(".aviso-mensaje").fadeOut(500);
}

$("#input-resp").keypress(function(e){
    var tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){  
    	$(".btn-send").click();    	
    }
});

function send_resp(idCliente){
	var mensaje=document.getElementById("input-resp").value;
    document.getElementById("input-resp").value="";
    var hoy = new Date();
	var dd = hoy.getDate();
	var mm = hoy.getMonth()+1;
	var yyyy = hoy.getFullYear();
	if(dd<10){
	    dd='0'+dd;
	} 
	if(mm<10){
	    mm='0'+mm;
	} 
	var hoy = dd+'/'+mm+'/'+yyyy;
	var hour=new Date();
	var hora=hour.getHours()+":"+hour.getMinutes(); 
    var msg='<div class="fila-mensajes">'+
    			'<div class="mensaje-ind-blue">'+
    			mensaje+
    			'</div>'+
    			'<div class="mensaje-fecha">('+
    			hoy+' - '+hora+
    			')</div>'+
    		'</div>';
    $(".pantalla-chat").append(msg);  
    var ventanaChat=document.getElementById("chat-web-online");
	ventanaChat.scrollTop = ventanaChat.scrollHeight; 
    $.ajax({
    	type:'POST',
    	url:'../recursos/respMsgWeb.php',
    	data:{
    		ip:idCliente,
    		msg:mensaje
    	},
    	success:function(data){   

    	}
   	});
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