create table staff (
	email varchar(50),
	nama varchar(20),
	nomor_hp varchar(10),
	password varchar(225),
	pekerjaan varchar(20),
	status varchar(10),
	primary key (email));

create table customer (
	nama varchar(20),
	nomorIdentitas varchar(15),
	nomorKendaraan varchar(10),
	nomorTelepon varchar(10),
	primary key (nomorIdentitas));

create table bahan(
	id varchar(16),
	nama varchar(20),
	jumlah int(100),
	harga float(6),
	exp_date date,
	primary key (id)
);

create table menu(
	id varchar(16),
	nama varchar(20),
	jenis varchar(20),
	harga float(6),
	primary key (id)
);

create table bahan_menu(
	id varchar(16),
	id_bahan varchar(16),
	id_menu varchar(16),
	primary key(id),
	foreign key (id_bahan) REFERENCES bahan(id),
	foreign key (id_menu) REFERENCES menu(id)
);

create table kategoriKamar (
	id varchar(15),
	nama varchar(20),
	primary key (id)
);

insert into kategoriKamar values('1','standard'), ('2','deluxe'), ('3','suite'), ('4','president');

create table kamar (
	harga int(11),
	kategori varchar(15),
	nomor_kamar int(3),
	status int (1),
	primary key (nomor_kamar),
	foreign key (kategori) references kategoriKamar(id)
);

create table reservation (
	id varchar(10),
	bykOrang int(3),
	kamar int(11),
	lama int(2),
	nama varchar(15),
	namaPemesan varchar(20),
	nomorTelepon varchar(10),
	status varchar(10),
	tanggalCheckin date,
	primary key (id),
	foreign key (kamar) references kamar(nomor_kamar),
	foreign key (nama) references customer(nomorIdentitas)
);

create table schedule (
	id not null auto_increment,
	hari int,
	jam_awal TIME,
	jam_akhir TIME,
	lokasi varchar(10),
	staff varchar(50),
	primary key(id),
	foreign key(staff) references staff(email)
);
