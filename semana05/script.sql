

CREATE TABLE empleado(

id         int auto_increment PRIMARY KEY,
name       varchar(100),
position   varchar(100),
salary     decimal(15,6),
start_date date,
office     varchar(100),
extn       varchar(50)

) ENGINE = INNODB;