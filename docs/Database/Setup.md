# Database Setup

## Connect as `root`
```
mysql -h localhost -u root -p
```

## Create databse
```
CREATE DATABASE c1_webapp DEFAULT CHARACTER SET = utf8mb4 DEFAULT COLLATE = utf8mb4_unicode_ci;
```

## Create user
```
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON c1_webapp.* TO 'c1_webapp'@'localhost' IDENTIFIED BY 'webapp^^^';
```

## Test
```
mysql -h localhost -u c1_webapp -p;
USE c1_webapp;
```
