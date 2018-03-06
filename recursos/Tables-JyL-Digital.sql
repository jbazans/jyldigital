create table TB_MSG_WEB(
	msg_id INT(11) AUTO_INCREMENT PRIMARY KEY,
	msg_ip VARCHAR(15),
	msg_value VARCHAR(300),
	msg_ip_destino VARCHAR(15),
	msg_state INT,
	msg_orden VARCHAR(25),
	msg_tipo VARCHAR(20),
	msg_fecha VARCHAR(10),
	msg_hora VARCHAR(5)
);

insert into TB_MSG_WEB(msg_ip,msg_value,msg_ip_destino,msg_state,msg_tipo)
values ('jyldigital.com','Hola lagrimilla, en que podemos ayudarte?','179.7.56.158',
0,'webmaster');