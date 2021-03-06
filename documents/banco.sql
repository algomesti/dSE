CREATE TABLE `product` (
  `id_product` INTEGER PRIMARY KEY NOT NULL,
  `id_product_type` INTEGER NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
)

CREATE TABLE "product_type" (
  `id_product_type` INTEGER PRIMARY KEY NOT NULL,
  `title` varchar(50) NOT NULL ,
  `description` varchar(250) DEFAULT NULL ,
  `tax` float NOT NULL ,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP 
)

CREATE TABLE "sale" (
  `id_sale` INTEGER PRIMARY KEY NOT NULL,
  `id_product`  INTEGER NOT NULL,
  `unity_value` float NOT NULL,
  `tax` float NOT NULL,
  `quantity`  INTEGER NOT NULL,
  `value`  INTEGER NOT NULL,
  `total`  INTEGER NOT NULL,
  `createAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `updateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP 
)
