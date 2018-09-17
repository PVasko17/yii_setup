DROP TABLE IF EXISTS universal.token;
CREATE TABLE  universal.token (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  action varchar(100) DEFAULT NULL,
  identity char(32) NOT NULL,
  token char(32) DEFAULT NULL,
  data text,
  expire_time int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS universal.functions_relations;
CREATE TABLE  universal.functions_relations (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  group_id int(10) unsigned NOT NULL,
  function_id int(10) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY FK_functions_relations_1 (function_id),
  KEY FK_functions_relations_2 (group_id),
  CONSTRAINT FK_functions_relations_1 FOREIGN KEY (function_id) REFERENCES functions (id),
  CONSTRAINT FK_functions_relations_2 FOREIGN KEY (group_id) REFERENCES groups (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS universal.groups;
CREATE TABLE  universal.groups (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(45) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS universal.functions;
CREATE TABLE  universal.functions (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  func varchar(45) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- CREATE TABLE account (
-- 	id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
-- 	email VARCHAR(128) NOT NULL,
-- 	password VARCHAR(128) NOT NULL,
-- 	group_id INTEGER NOT NULL
-- )
-- ENGINE = InnoDB;

DROP TABLE IF EXISTS universal.account;
CREATE TABLE  universal.account (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(128) NOT NULL,
  password varchar(128) NOT NULL,
  group_id int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY FK_account_1 (group_id),
  CONSTRAINT FK_account_1 FOREIGN KEY (group_id) REFERENCES groups (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE verification (
	account_id INTEGER NOT NULL,
	type INTEGER NOT NULL,
	code VARCHAR(128) NOT NULL,
	data TEXT,
	PRIMARY KEY (account_id, type),
	CONSTRAINT FK_verification_account FOREIGN KEY (account_id)
		REFERENCES account (id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;

