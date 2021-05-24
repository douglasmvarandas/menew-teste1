-- listaTelefonica.tbl_telefone definition

CREATE TABLE `tbl_telefone` (
  `tel_in_id` int NOT NULL AUTO_INCREMENT,
  `con_in_id` int NOT NULL,
  `tel_in_ddd` varchar(5) DEFAULT NULL,
  `tel_in_telefone` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`tel_in_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;