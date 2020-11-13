create table staff (
	id varchar(10),
	email varchar(25),
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
	nomorKendaraan varchar(10),
	nomorTelepon varchar(10),
	primary key (id));

create table kamar (
	id varhcar(10),
	harga int(11),
	kategori varchar(15),
	nomor_kamar int(3),
	status int (1),
	primary key (id)
);

create table reservation (
	id varchar(10),
	bykOrang int(3),
	idKamar varchar(10),
	lama int(2),
	idCust varchar(16),
	namaPemesan varchar(20),
	nomorTelepon varchar(10),
	status varchar(10),
	tanggalCheckin date,
	primary key (id),
	foreign key (idKamar) references kamar(id),
	foreign key (idCust) references customer(id)
);