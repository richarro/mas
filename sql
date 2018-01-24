DROP TABLE member;    /* remove this statement if you don't already have a member table created */

CREATE TABLE member(
  mem_no INTEGER (5) PRIMARY KEY AUTO_INCREMENT,
  mem_fname VARCHAR (30),
  mem_mi CHAR (1),
  mem_lname VARCHAR (30),
  mem_duty_ph VARCHAR (15),
  mem_cell_number VARCHAR (15),
  mem_add_1 VARCHAR (50),
  mem_add_2 VARCHAR (50),
  mem_email VARCHAR (50),
  mem_installation VARCHAR (15),
  mem_category_cd CHAR (2),
  mem_type CHAR (1),
  mem_remarks VARCHAR (150),
  mem_position VARCHAR (20),
  mem_add_date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  mem_last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 );
