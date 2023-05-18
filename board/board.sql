CREATE TABLE board (
    id int(11) unsigned NOT NULL auto_increment,
    name varchar(20) NOT NULL,
    email varchar(30) NULL,
    pass varchar(12) NOT NULL,
    title varchar(70) NOT NULL,
    content text NOT NULL,
    wdate datetime NOT NULL,
    ip varchar(15) NOT NULL,
    view int(11) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);