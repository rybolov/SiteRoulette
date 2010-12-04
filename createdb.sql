--Please change before you run
--Remember to use your settings from here in config.php
--usage: mysql -u root -p < createdb.sql

Create DATABASE siteroulette;

GRANT SELECT ON siteroulette.* to 'username@localhost' IDENTIFIED BY 'password';

FLUSH PRIVILEGES;



