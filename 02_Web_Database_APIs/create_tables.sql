create table USERS (
	user_id int not null AUTO_INCREMENT,
	username varchar(20) unique,
	firstname varchar(40),
	lastname varchar(40),
	password varchar(40),
	usertype varchar(20),
	created_date timestamp,
	primary key (user_id)
);

create table CHEEPS (
	cheep_id int not null AUTO_INCREMENT,
	cheep_text varchar(141),
	created_date timestamp,
	user_id int,
	primary key (cheep_id),
	foreign key (user_id) references USERS(user_id)	
);

create table FOLLOWS (
	user_id int not null,
	follows_id int not null,
	created_date timestamp,
	primary key (user_id, follows_id)	
);
