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

create table bahan(
	id varchar(16),
	nama varchar(20),
	jumlah int(100),
	harga float(6),
	exp_date date,
	primary key (id));
);

create table menu(
	id varchar(16),
	nama varchar(20),
	jenis varchar(20),
	harga float(6),
	primary key (id));
);

create table bahan_menu(
	id varchar(16),
	id_bahan varchar(16),
	id_menu varchar(16),
	primary key(id),
	foreign key (id_bahan) REFERENCES bahan(id),
	foreign key (id_menu) REFERENCES menu(id)
);
