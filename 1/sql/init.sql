use boxing;
create table trainer (
id_trainer int (15) AUTO_INCREMENT,
trainer_name varchar (20) NOT NULL,
trainer_lname varchar (20) NOT NULL,
PRIMARY KEY (id_trainer)
);
create table fighter (
id_fighter int(15) AUTO_INCREMENT,
weight_category varchar(20) NOT NULL,
raiting int(100) NOT NULL,
name varchar(20) NOT NULL,
last_name varchar(20) NOT NULL,
trainer_id int(15) NOT NULL,
PRIMARY KEY (id_fighter),
FOREIGN KEY (trainer_id) REFERENCES trainer (id_trainer) 
);
create table championships ( 
id_championship int (10) AUTO_INCREMENT,
fighters_number int(50) 
championship_raiting int(100) NOT NULL,
prize_fond int(200) NOT NULL,
championship_name varchar(20) NOT NULL,
PRIMARY KEY (id_championship)
);
create table championships_fighters (
id_record int(10) AUTO_INCREMENT,
fighter_id int(10) NOT NULL,
championship_id int(10) NOT NULL,
tournament_position int(2) NOT NULL,
PRIMARY KEY (id_record),
FOREIGN KEY (championship_id)  
REFERENCES championships (id_championship),
FOREIGN KEY (fighter_id)  
REFERENCES championships (id_fighter)
);
create table stadiums (
id_stadium int(10) AUTO_INCREMENT,
stadium_name varchar(20) NOT NULL,
fondation_year int(4) NOT NULL,
PRIMARY KEY (id_stadium)
);
create table championships_stadiums (
id_record int(10) AUTO_INCREMENT,
stadium_id int(10) NOT NULL,
championship_id int(10) NOT NULL,
ticket_price int(4) NOT NULL,
PRIMARY KEY (id_record),
FOREIGN KEY (championship_id)  
REFERENCES championships (id_championship),
FOREIGN KEY (stadium_id)  
REFERENCES stadiums (id_stadium)
);