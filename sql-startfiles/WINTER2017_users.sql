CREATE USER 'WINTER2017'@'localhost' IDENTIFIED BY '<password>'
GRANT SELECT,INSERT,UPDATE,DELETE ON csescholars.WINTER2017_users TO 'WINTER2017'@'localhost';
GRANT SELECT,INSERT,UPDATE,DELETE ON csescholars.WINTER2017_events TO 'WINTER2017'@'localhost';
GRANT SELECT,INSERT,UPDATE,DELETE ON csescholars.WINTER2017_attendance TO 'WINTER2017'@'localhost';
