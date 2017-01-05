USE csescholars;

DROP TABLE IF EXISTS WINTER2017_users, WINTER2017_events, WINTER2017_attendance;

CREATE TABLE WINTER2017_users
(
	uniqname varchar(10) PRIMARY KEY,
	admin bool DEFAULT false
);

CREATE TABLE WINTER2017_events
(
	eventid int PRIMARY KEY AUTO_INCREMENT,
	name varchar(100),
	host varchar(100),
	datetime varchar(100),
	location varchar(100),
	description varchar(2000),
	access varchar(10),
  open bool,
	points INT
);

CREATE TABLE WINTER2017_attendance
(
	attid int PRIMARY KEY AUTO_INCREMENT,
	uniqname varchar(10),
	event int,
	FOREIGN KEY (uniqname) REFERENCES WINTER2017_users(uniqname),
	FOREIGN KEY (event) REFERENCES WINTER2017_events(eventid)
);
