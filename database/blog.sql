

CREATE database blog DEFAULT CHARACTER SET utf8;
use blog;
CREATE TABLE IF NOT EXISTS user(
id int NOT NULL  PRIMARY KEY auto_increment,
username VARCHAR(20) not null,
password VARCHAR(32) not null,
email VARCHAR (100) not null
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS label(
id int not null PRIMARY KEY auto_increment,
labelname NOT NULL VARCHAR (50)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS label_content(
id int not NULL PRIMARY KEY auto_increment,
lid INT not NULL ,
cid int not null,
 foreign key(lid) references label(id),
 foreign key(cid) references post(id),
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE table IF NOT  EXISTS cate(
id int not null PRIMARY  key auto_increment,
cname not null VARCHAR (200),
fid int
)ENGINE=MyISAM DEFAULT CHARSET=utf8;