tbl_user(
   user_id INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(100) NOT NULL,
   email VARCHAR(40) NOT NULL,
   password VARCHAR(40) NOT NULL,
   date DATE,
   PRIMARY KEY ( user_id )
);
