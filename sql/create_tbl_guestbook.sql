CREATE TABLE IF NOT EXISTS tbl_guestbook
(
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    address TEXT,
    tel VARCHAR(32),
    PRIMARY KEY (id)
);