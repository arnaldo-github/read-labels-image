
drop table posts;

create table posts(
    id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL ,
    description VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    labels text
);