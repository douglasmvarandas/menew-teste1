-- listaTelefonica.tbl_contato definition

CREATE TABLE `tbl_contato` (
  `con_in_id` int NOT NULL AUTO_INCREMENT,
  `con_st_nome` varchar(200) NOT NULL,
  `con_st_email` varchar(255) DEFAULT NULL,
  `con_st_cidade` varchar(100) DEFAULT NULL,
  `con_st_estado` varchar(50) DEFAULT NULL,
  `con_st_categoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`con_in_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;