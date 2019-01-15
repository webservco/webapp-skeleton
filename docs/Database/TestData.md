# Using test data

## Create table
```
DROP TABLE IF EXISTS ws_test_data;
CREATE TABLE ws_test_data (
	id INT(8) UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(45) NOT NULL,
	value INT(8) UNSIGNED NOT NULL,
	PRIMARY KEY (id),
    KEY k_name (name),
    KEY k_value (value)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

## Create stored procedure
This procedure inserts 10 000 000 rows or random numbers.
```
DELIMITER $$
CREATE PROCEDURE generate_ws_test_data()
BEGIN
    DECLARE i INT DEFAULT 1;
    WHILE i <= 10000000 DO
        INSERT INTO ws_test_data (id, name, value) VALUES
        (i, CONCAT('Name ', i), FLOOR(RAND()*(10000000-1000000+1))+1000000);
        SET i = i + 1;
    END WHILE;
END$$
DELIMITER ;
```

## Generate data

**Notes**:
- This procedure can run for a long time depending on your computer hardware specifications;
- The resulting data will require about 666 Mb of hard disk space;

```
mysql -h localhost -u c1_webapp -p
USE c1_webapp;
TRUNCATE TABLE ws_test_data;
CALL generate_ws_test_data;
```

## Delete stored procedure
```
DROP PROCEDURE IF EXISTS generate_ws_test_data;
```
