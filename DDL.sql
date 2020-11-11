create table staff (
	id varchar(10),
	email varhcar(25),
	nama varchar(20),
	nomor_hp varchar(10),
	password varchar(10),
	pekerjaan varchar(20),
	status varchar(10),
	primary key (id));

create table customer (
	id varchar(16),
	nama varchar(20),
	nomorIdentitas varchar(15),
	nomorKendaraan varhcar(10),
	nomorTelepon varchar(10),
	primary key (id));
