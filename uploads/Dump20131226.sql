CREATE DATABASE  IF NOT EXISTS `358354_p4_vielgi_biz` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `358354_p4_vielgi_biz`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 50.57.219.28    Database: 358354_p4_vielgi_biz
-- ------------------------------------------------------
-- Server version	5.1.61-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` char(5) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `modified_date` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `FK_userid_idx` (`user_id`),
  CONSTRAINT `FK_contactUserID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (126,NULL,NULL,NULL,NULL,NULL,NULL,0,0,85,'one','two','one@vielgi.com'),(127,'','','','','','1',1387617999,85,85,'one','two','one@vielgi.com'),(128,NULL,NULL,NULL,NULL,NULL,NULL,0,0,86,'first','user','first.user@vielgi.com'),(129,'add1','','','','','1',1387618791,85,85,'one','two','admin@vielgi.com'),(130,'add1','','','','','1',1387671313,85,85,'one2','two','admin@vielgi.com'),(131,'add1','','','','','1',1387672429,85,85,'Real','Admin','admin@vielgi.com'),(132,'add1','','','','','1',1387673353,85,85,'Real','Admin','admin@vielgi.com'),(133,'add1','','','','','1',1387674869,85,85,'System','Admin','admin@vielgi.com'),(134,'add1','add2','','','','1',1387724891,85,85,'System','Admin','admin@vielgi.com'),(135,NULL,NULL,NULL,NULL,NULL,NULL,0,0,87,'test1','test2','test@testok.com'),(136,'add1','add2','','','l','1',1387824905,85,85,'System','Admin','admin@vielgi.com'),(137,'add1','add2','','','l','1',1387825030,85,85,'System','Admin','admin@vielgi.com'),(138,NULL,NULL,NULL,NULL,NULL,NULL,0,0,88,'123','321','321@vielgi.com'),(139,NULL,NULL,NULL,NULL,NULL,NULL,1387831316,89,89,'lkj',';lkj','lkjlkl@vielgi.com'),(140,NULL,NULL,NULL,NULL,NULL,NULL,1387898682,90,90,'qwe','qwe','qwe@vielgi.com'),(141,NULL,NULL,NULL,NULL,NULL,NULL,1387898756,91,91,'dar','da','daa@vielgi.com'),(142,NULL,NULL,NULL,NULL,NULL,NULL,1387898830,92,92,'fdas','dfas','fda2121s@vielgi.com'),(143,NULL,NULL,NULL,NULL,NULL,NULL,1387899209,93,93,'233','trew','trew@vielgi.com'),(144,NULL,NULL,NULL,NULL,NULL,NULL,1387899299,94,94,'vla','d','va@vielgi.com'),(145,NULL,NULL,NULL,NULL,NULL,NULL,1387899606,95,95,'fdasl;kj','lk;j','klj@gmail.com'),(146,NULL,NULL,NULL,NULL,NULL,NULL,1387900215,96,96,'432','3242','2134@vielgi.com'),(147,NULL,NULL,NULL,NULL,NULL,NULL,1387900320,97,97,'123','3241','432@vielgi.com'),(148,NULL,NULL,NULL,NULL,NULL,NULL,1387900503,98,98,'dfas','daf','3242342@vielgi.com'),(149,NULL,NULL,NULL,NULL,NULL,NULL,1387900916,99,99,'fdsajlk','lk;','112121va@vielgi.com'),(150,NULL,NULL,NULL,NULL,NULL,NULL,1387900980,100,100,'rdkajs;l',';lkj','112121sva@vielgi.com'),(151,NULL,NULL,NULL,NULL,NULL,NULL,1387901061,101,101,'fdaslkj','klj;','lkjklkl@vielgi.com'),(152,NULL,NULL,NULL,NULL,NULL,NULL,1387901149,102,102,'fdsa','fadsfasdf','112121sv2a@vielgi.com'),(153,NULL,NULL,NULL,NULL,NULL,NULL,1387901255,103,103,'123','13','1121211sv2a@vielgi.com'),(154,NULL,NULL,NULL,NULL,NULL,NULL,1387901425,104,104,'123123','123123k','12312312312@vielgi.com'),(155,NULL,NULL,NULL,NULL,NULL,NULL,1387901629,105,105,'123123','123','12312312312312321@vielgi.com'),(156,NULL,NULL,NULL,NULL,NULL,NULL,1387901692,106,106,'fkdso','j;lkfdsa','l@vielgi.com'),(157,NULL,NULL,NULL,NULL,NULL,NULL,1387901814,107,107,'123','`klj','12312312321@vielgi.com'),(158,NULL,NULL,NULL,NULL,NULL,NULL,1387901897,108,108,'123','312','1231231223123@vielgi.com'),(159,NULL,NULL,NULL,NULL,NULL,NULL,1387902003,109,109,'123123','312','312312@vielgi.com'),(160,NULL,NULL,NULL,NULL,NULL,NULL,1387904239,110,110,'fdaslk','klj','12221@vielgi.com'),(161,NULL,NULL,NULL,NULL,NULL,NULL,1387904370,111,111,'sad','das','sas@vielgi.com'),(162,NULL,NULL,NULL,NULL,NULL,NULL,1387904431,112,112,'ds','da','da.da@vielgi.com'),(163,NULL,NULL,NULL,NULL,NULL,NULL,1387904474,113,113,'daf','fad','fad123@vielgi.com'),(164,NULL,NULL,NULL,NULL,NULL,NULL,1387904527,114,114,'321','kjfadsk','fdsasadf.d@vielgi.com'),(165,NULL,NULL,NULL,NULL,NULL,NULL,1387904649,115,115,'fdsa','fdsa','fdasfads@vielgi.com'),(166,NULL,NULL,NULL,NULL,NULL,NULL,1387904760,116,116,'3421','321','eeeevielgi@vielgi.com'),(167,NULL,NULL,NULL,NULL,NULL,NULL,1387904820,117,117,'fdskjl','lk;j','lkjlkll@vielgi.com'),(168,NULL,NULL,NULL,NULL,NULL,NULL,1387904976,118,118,'fdas','dfa','fasiior@vielgi.com'),(169,'','','','','','',1387905044,118,118,'fdas','dfa','admin@vielgi.com'),(170,'','','','','','',1387905084,118,118,'fdas','dfa','fasiior1@vielgi.com'),(171,NULL,NULL,NULL,NULL,NULL,NULL,1387906404,119,119,'vielgi','fdaslkj','123123123122@vielgi.com'),(172,'','','','','12121','',1387906443,119,119,'vielgi','fdaslkj','123123123122@vielgi.com1'),(173,NULL,NULL,NULL,NULL,NULL,NULL,1387907286,120,120,'fa','sa','ddd@vielgi.com'),(174,NULL,NULL,NULL,NULL,NULL,NULL,1387907410,121,121,'123','321','3211k2312lk@vielgi.com'),(175,NULL,NULL,NULL,NULL,NULL,NULL,1387907719,122,122,'123','4321','3213212dd@vielgi.com'),(176,NULL,NULL,NULL,NULL,NULL,NULL,1387907878,123,123,'32','kl','kkkjiiii@vielgi.com'),(177,NULL,NULL,NULL,NULL,NULL,NULL,1387907931,124,124,'ewq','qwe','123@vielgi.com'),(178,NULL,NULL,NULL,NULL,NULL,NULL,1387908014,125,125,'fdsa','sad','veaddd@vielgi.com'),(179,NULL,NULL,NULL,NULL,NULL,NULL,1387908116,126,126,'fdaslkj','kljkjk','kkkiweee@vielgi.com'),(180,NULL,NULL,NULL,NULL,NULL,NULL,1387908172,127,127,'fdaslkj;','klj;','kkjiiiiiii@vielgi.com'),(181,NULL,NULL,NULL,NULL,NULL,NULL,1387908603,128,128,'fafa','sasa','sasafafa@vielgi.com'),(182,NULL,NULL,NULL,NULL,NULL,NULL,1387909015,129,129,'fdas','lkj','kkjlkli2@vielgi.com'),(183,NULL,NULL,NULL,NULL,NULL,NULL,1387909156,130,130,'fdsa','lkjkjkjl','lkjkjlkjjkl@vielgi.com'),(184,NULL,NULL,NULL,NULL,NULL,NULL,1387909497,131,131,'123','last','last123@vielgi.com'),(185,NULL,NULL,NULL,NULL,NULL,NULL,1387909744,132,132,'123','321','32122sss@vielgi.com'),(186,NULL,NULL,NULL,NULL,NULL,NULL,1387910093,133,133,'fadskjl','lkjkjlkjk','llkiiuoiuoi@vielgi.com'),(187,NULL,NULL,NULL,NULL,NULL,NULL,1387910207,134,134,'fad','dqa','faf1432a@vielgi.com'),(188,NULL,NULL,NULL,NULL,NULL,NULL,1387910343,135,135,'fa','sa','sa.fa23@vielgi.com'),(189,NULL,NULL,NULL,NULL,NULL,NULL,1387910431,136,136,'312','kl','klkllkjkkiii@vielgi.com'),(190,NULL,NULL,NULL,NULL,NULL,NULL,1387913505,137,137,'fdsajkl;','lkjkjlkj','lkjlkjlkjlkj@vielgi.com'),(191,NULL,NULL,NULL,NULL,NULL,NULL,1387913613,138,138,'fdjsalk;','lkjkjlk','lkjlkjl212k@vielgi.com'),(192,NULL,NULL,NULL,NULL,NULL,NULL,1387913695,139,139,'fdsa','kljlk','lkjlkjlkjlkuii@vielgi.com'),(193,NULL,NULL,NULL,NULL,NULL,NULL,1387913807,140,140,'fdjskl','kljlkj','kljlkjlkjlkjii@vielgi.com'),(194,NULL,NULL,NULL,NULL,NULL,NULL,1387913914,141,141,'fdkjl','klj;','kjlkjkijiii@vielgi.com'),(195,NULL,NULL,NULL,NULL,NULL,NULL,1387913940,142,142,'fdsjkla','lkjlkjlkjlk','lkjlkjljlkjlkjjiiii@vielgi.com'),(196,NULL,NULL,NULL,NULL,NULL,NULL,1387914065,143,143,'fsdajkl','kljlkjjklkjlkjj','kljjlkjlkjlkkjljklk@vielgi.com'),(197,NULL,NULL,NULL,NULL,NULL,NULL,1387914135,144,144,'fdsakjl','lkjlkjlkjl','lkjljkljjlkjlkjlkjlkljkl@vielgi.com'),(198,NULL,NULL,NULL,NULL,NULL,NULL,1387914201,145,145,'fadslkjlkjklj','lkjkjlkjlj','lkjlkjkljlkjkjl@vielgi.com'),(199,NULL,NULL,NULL,NULL,NULL,NULL,1387914345,146,146,'fcdsalkj','lkjlk','kjlljijijlijijhbuhujkhkjuh@vielgi.com'),(200,NULL,NULL,NULL,NULL,NULL,NULL,1387914990,147,147,'dsalkj','lkjlkjlkjlkjkl','lkjlkjlkjlkjklklk@vielgi.com'),(201,NULL,NULL,NULL,NULL,NULL,NULL,1387915070,148,148,'jkflds','lkjlkjlkjlk','lkjlkjlkjjk@vielgi.com'),(202,NULL,NULL,NULL,NULL,NULL,NULL,1387916182,149,149,'dadad','lkjkjlkjlkj','lkjlkjlkkjkl@vielgi.com'),(203,NULL,NULL,NULL,NULL,NULL,NULL,1387916286,150,150,'one','mor','one.more.222@vielgi.com'),(204,NULL,NULL,NULL,NULL,NULL,NULL,1387916417,151,151,'sa','dea','dsaas.dafdsaf@vielgi.com'),(205,NULL,NULL,NULL,NULL,NULL,NULL,1387916512,152,152,'fdaslkj','lkjlkjlkjlk','kljlkjlkjlkjddddlkk@vielgi.com'),(206,NULL,NULL,NULL,NULL,NULL,NULL,1388073861,153,153,'fadsfdsaf','fdsafasdfadsf','lkjfadslkjfladjsoi2342342sd@vielgi.com'),(207,NULL,NULL,NULL,NULL,NULL,NULL,1388074284,154,154,'123','321','43212xxxx13132@vielgi.com'),(208,NULL,NULL,NULL,NULL,NULL,NULL,1388074997,155,155,'asdf','lkjlkj','lkjlkjlkjlxxxxxkjlklk@vielgi.com'),(209,'add1','add2','','','l','1',1388089462,85,85,'System','Admin','admin@vielgi.biz');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goals`
--

DROP TABLE IF EXISTS `goals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goals` (
  `goal_id` int(11) NOT NULL AUTO_INCREMENT,
  `modified_date` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `goals` varchar(255) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `public` bit(1) DEFAULT NULL,
  PRIMARY KEY (`goal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
INSERT INTO `goals` VALUES (50,1387726840,0,NULL,64,'\0'),(51,1387728021,0,'',65,''),(52,1387728736,0,'',66,''),(53,1387728768,0,'',67,''),(54,1387728771,0,'',68,''),(55,1387728791,0,'',69,''),(56,1387730642,0,'',70,''),(57,1387730644,0,'',71,''),(58,1387730726,0,'',72,''),(59,1387730745,0,'',73,''),(60,1387730867,0,'',74,''),(61,1387731034,85,'lllooo',75,''),(62,1387912632,0,'',76,''),(63,1387916105,0,'',77,''),(64,1387918874,0,'',78,''),(65,1387919887,0,'',79,''),(66,1387920012,0,'',80,''),(67,1387920183,85,'',81,''),(68,1387920311,85,'',82,''),(69,1388072908,85,'plan3\" can be reached by Thursday, November 20, 2025<br>',83,''),(70,1388073128,85,'plan3 : 10000hours can be reached by Saturday, January 02, 2021<br>',84,''),(71,1388073158,85,'plan3 : 10000hours can be reached by Saturday, January 02, 2021<br>plan 4 : 200hours can be reached by Monday, February 22, 2021<br>',85,''),(72,1388090323,85,'plan3 : 10000hours can be reached by Thursday, May 20, 2021<br>',86,''),(73,1388090345,85,'plan3 : 10000hours can be reached by Thursday, May 20, 2021<br>',87,''),(74,1388090488,154,'plan3 : 10000hours can be reached by 7/17/2022<br>',88,''),(75,1388090574,85,'cooko  :  129  :  hours can be reached by Monday, March 03, 2014<br>',89,''),(76,1388090678,154,' plan3  :  10000   hours can be reached by 9/4/2027<br>',90,''),(77,1388095948,154,' plan3  :  10000   hours can be reached by 8/3/2021<br> plan 4  :  200   hours can be reached by 9/27/2021<br>',91,'\0');
/*!40000 ALTER TABLE `goals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `modified_date` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `FK_id` int(11) DEFAULT NULL,
  `FK_table` varchar(255) DEFAULT NULL,
  `login` bit(1) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (50,1387132147,56,0,'users',''),(51,1387132147,56,88,'contacts',''),(52,1387132240,56,0,'users','\0'),(53,1387132240,56,89,'contacts','\0'),(54,1387132269,56,1,'users','\0'),(55,1387132269,56,90,'contacts','\0'),(56,1387132443,56,0,'users','\0'),(57,1387132443,56,91,'contacts','\0'),(58,1387132855,56,92,'contacts','\0'),(59,1387133034,56,93,'contacts','\0'),(60,1387133501,56,95,'contacts','\0'),(61,1387134363,56,97,'contacts','\0'),(62,1387134404,56,98,'contacts','\0'),(63,1387134460,56,99,'contacts','\0'),(64,1387134471,56,100,'contacts','\0'),(65,1387136051,56,101,'contacts','\0'),(66,1387136962,0,102,'contacts','\0'),(67,1387136962,0,62,'users','\0'),(68,1387137285,67,103,'contacts','\0'),(69,1387137285,67,67,'users','\0'),(70,1387486798,68,104,'contacts','\0'),(71,1387486798,68,68,'users','\0'),(72,1387487131,69,105,'contacts','\0'),(73,1387487131,69,69,'users','\0'),(74,1387487244,70,106,'contacts','\0'),(75,1387487244,70,70,'users','\0'),(76,1387557264,69,107,'contacts','\0'),(77,1387557281,69,108,'contacts','\0'),(78,1387557362,69,109,'contacts','\0'),(79,1387557390,69,110,'contacts','\0'),(80,1387565727,71,111,'contacts','\0'),(81,1387565727,71,71,'users','\0'),(82,1387571410,72,112,'contacts','\0'),(83,1387571410,72,72,'users','\0'),(84,1387571446,73,113,'contacts','\0'),(85,1387571446,73,73,'users','\0'),(86,1387571492,74,114,'contacts','\0'),(87,1387571492,74,74,'users','\0'),(88,1387571552,75,115,'contacts','\0'),(89,1387571552,75,75,'users','\0'),(90,1387571615,76,116,'contacts','\0'),(91,1387571615,76,76,'users','\0'),(92,1387571659,77,117,'contacts','\0'),(93,1387571659,77,77,'users','\0'),(94,1387571735,78,118,'contacts','\0'),(95,1387571735,78,78,'users','\0'),(96,1387571809,79,119,'contacts','\0'),(97,1387571809,79,79,'users','\0'),(98,1387571846,80,120,'contacts','\0'),(99,1387571846,80,80,'users','\0'),(100,1387572128,81,121,'contacts','\0'),(101,1387572128,81,81,'users','\0'),(102,1387594832,82,122,'contacts','\0'),(103,1387594832,82,82,'users','\0'),(104,1387597953,83,123,'contacts','\0'),(105,1387597953,83,83,'users','\0'),(106,1387598280,84,124,'contacts','\0'),(107,1387598280,84,84,'users','\0'),(108,1387598309,84,125,'contacts','\0'),(110,1387616785,85,85,'users','\0'),(111,1387617999,85,127,'contacts','\0'),(112,1387618376,86,128,'contacts','\0'),(113,1387618376,86,86,'users','\0'),(114,1387618791,85,129,'contacts','\0'),(115,1387671314,85,130,'contacts','\0'),(116,1387672430,85,131,'contacts','\0'),(117,1387673354,85,132,'contacts','\0'),(118,1387674870,85,133,'contacts','\0'),(119,1387724891,85,134,'contacts','\0'),(120,1387726840,0,50,'goals','\0'),(121,1387728021,0,51,'goals','\0'),(122,1387728736,0,52,'goals','\0'),(123,1387728768,0,53,'goals','\0'),(124,1387728772,0,54,'goals','\0'),(125,1387728792,0,55,'goals','\0'),(126,1387730642,0,56,'goals','\0'),(127,1387730645,0,57,'goals','\0'),(128,1387730726,0,58,'goals','\0'),(129,1387730745,0,59,'goals','\0'),(130,1387730867,0,60,'goals','\0'),(131,1387731035,0,61,'goals','\0'),(132,1387823380,87,135,'contacts','\0'),(133,1387823380,87,87,'users','\0'),(134,1387824906,85,136,'contacts','\0'),(135,1387825030,85,137,'contacts','\0'),(136,1387830164,88,138,'contacts','\0'),(137,1387830164,88,88,'users','\0'),(138,1387831316,89,139,'contacts','\0'),(139,1387831316,89,89,'users','\0'),(140,1387898682,90,140,'contacts','\0'),(141,1387898682,90,90,'users','\0'),(142,1387898756,91,141,'contacts','\0'),(143,1387898756,91,91,'users','\0'),(144,1387898830,92,142,'contacts','\0'),(145,1387898830,92,92,'users','\0'),(146,1387899209,93,143,'contacts','\0'),(147,1387899209,93,93,'users','\0'),(148,1387899299,94,144,'contacts','\0'),(149,1387899299,94,94,'users','\0'),(150,1387899606,95,145,'contacts','\0'),(151,1387899606,95,95,'users','\0'),(152,1387900215,96,146,'contacts','\0'),(153,1387900215,96,96,'users','\0'),(154,1387900320,97,147,'contacts','\0'),(155,1387900320,97,97,'users','\0'),(156,1387900503,98,148,'contacts','\0'),(157,1387900503,98,98,'users','\0'),(158,1387900916,99,149,'contacts','\0'),(159,1387900916,99,99,'users','\0'),(160,1387900980,100,150,'contacts','\0'),(161,1387900980,100,100,'users','\0'),(162,1387901061,101,151,'contacts','\0'),(163,1387901061,101,101,'users','\0'),(164,1387901149,102,152,'contacts','\0'),(165,1387901149,102,102,'users','\0'),(166,1387901256,103,153,'contacts','\0'),(167,1387901256,103,103,'users','\0'),(168,1387901425,104,154,'contacts','\0'),(169,1387901425,104,104,'users','\0'),(170,1387901629,105,155,'contacts','\0'),(171,1387901629,105,105,'users','\0'),(172,1387901692,106,156,'contacts','\0'),(173,1387901692,106,106,'users','\0'),(174,1387901814,107,157,'contacts','\0'),(175,1387901814,107,107,'users','\0'),(176,1387901897,108,158,'contacts','\0'),(177,1387901897,108,108,'users','\0'),(178,1387902003,109,159,'contacts','\0'),(179,1387902003,109,109,'users','\0'),(180,1387904239,110,160,'contacts','\0'),(181,1387904239,110,110,'users','\0'),(182,1387904370,111,161,'contacts','\0'),(183,1387904370,111,111,'users','\0'),(184,1387904431,112,162,'contacts','\0'),(185,1387904431,112,112,'users','\0'),(186,1387904474,113,163,'contacts','\0'),(187,1387904474,113,113,'users','\0'),(188,1387904527,114,164,'contacts','\0'),(189,1387904527,114,114,'users','\0'),(190,1387904649,115,165,'contacts','\0'),(191,1387904649,115,115,'users','\0'),(192,1387904760,116,166,'contacts','\0'),(193,1387904760,116,116,'users','\0'),(194,1387904820,117,167,'contacts','\0'),(195,1387904820,117,117,'users','\0'),(196,1387904976,118,168,'contacts','\0'),(197,1387904976,118,118,'users','\0'),(198,1387905085,118,170,'contacts','\0'),(199,1387906404,119,171,'contacts','\0'),(200,1387906404,119,119,'users','\0'),(201,1387906443,119,172,'contacts','\0'),(202,1387907286,120,173,'contacts','\0'),(203,1387907286,120,120,'users','\0'),(204,1387907410,121,174,'contacts','\0'),(205,1387907410,121,121,'users','\0'),(206,1387907719,122,175,'contacts','\0'),(207,1387907719,122,122,'users','\0'),(208,1387907878,123,176,'contacts','\0'),(209,1387907878,123,123,'users','\0'),(210,1387907931,124,177,'contacts','\0'),(211,1387907931,124,124,'users','\0'),(212,1387908014,125,178,'contacts','\0'),(213,1387908014,125,125,'users','\0'),(214,1387908116,126,179,'contacts','\0'),(215,1387908116,126,126,'users','\0'),(216,1387908172,127,180,'contacts','\0'),(217,1387908172,127,127,'users','\0'),(218,1387908603,128,181,'contacts','\0'),(219,1387908603,128,128,'users','\0'),(220,1387909015,129,182,'contacts','\0'),(221,1387909015,129,129,'users','\0'),(222,1387909156,130,183,'contacts','\0'),(223,1387909156,130,130,'users','\0'),(224,1387909497,131,184,'contacts','\0'),(225,1387909497,131,131,'users','\0'),(226,1387909744,132,185,'contacts','\0'),(227,1387909744,132,132,'users','\0'),(228,1387910093,133,186,'contacts','\0'),(229,1387910093,133,133,'users','\0'),(230,1387910207,134,187,'contacts','\0'),(231,1387910207,134,134,'users','\0'),(232,1387910343,135,188,'contacts','\0'),(233,1387910343,135,135,'users','\0'),(234,1387910431,136,189,'contacts','\0'),(235,1387910431,136,136,'users','\0'),(236,1387912633,0,62,'goals','\0'),(237,1387913505,137,190,'contacts','\0'),(238,1387913505,137,137,'users','\0'),(239,1387913613,138,191,'contacts','\0'),(240,1387913613,138,138,'users','\0'),(241,1387913695,139,192,'contacts','\0'),(242,1387913695,139,139,'users','\0'),(243,1387913807,140,193,'contacts','\0'),(244,1387913807,140,140,'users','\0'),(245,1387913914,141,194,'contacts','\0'),(246,1387913914,141,141,'users','\0'),(247,1387913940,142,195,'contacts','\0'),(248,1387913940,142,142,'users','\0'),(249,1387914065,143,196,'contacts','\0'),(250,1387914065,143,143,'users','\0'),(251,1387914135,144,197,'contacts','\0'),(252,1387914135,144,144,'users','\0'),(253,1387914201,145,198,'contacts','\0'),(254,1387914201,145,145,'users','\0'),(255,1387914345,146,199,'contacts','\0'),(256,1387914345,146,146,'users','\0'),(257,1387914990,147,200,'contacts','\0'),(258,1387914990,147,147,'users','\0'),(259,1387915070,148,201,'contacts','\0'),(260,1387915070,148,148,'users','\0'),(261,1387916105,0,63,'goals','\0'),(262,1387916182,149,202,'contacts','\0'),(263,1387916182,149,149,'users','\0'),(264,1387916286,150,203,'contacts','\0'),(265,1387916286,150,150,'users','\0'),(266,1387916417,151,204,'contacts','\0'),(267,1387916417,151,151,'users','\0'),(268,1387916512,152,205,'contacts','\0'),(269,1387916512,152,152,'users','\0'),(270,1387918874,0,64,'goals','\0'),(271,1387919887,0,65,'goals','\0'),(272,1387920012,0,66,'goals','\0'),(273,1387920183,0,67,'goals','\0'),(274,1387920311,0,68,'goals','\0'),(275,1388063567,85,0,'plans','\0'),(276,1388063705,85,0,'plans','\0'),(278,1388064032,85,52,'plans','\0'),(279,1388072908,0,69,'goals','\0'),(280,1388073128,0,70,'goals','\0'),(281,1388073158,0,71,'goals','\0'),(282,1388073861,153,206,'contacts','\0'),(283,1388073861,153,153,'users','\0'),(284,1388074284,154,207,'contacts','\0'),(285,1388074284,154,154,'users','\0'),(286,1388074286,154,154,'users',''),(287,1388074365,85,85,'users',''),(288,1388074997,155,208,'contacts','\0'),(289,1388074997,155,155,'users','\0'),(290,1388083265,85,85,'users',''),(291,1388083523,85,85,'users',''),(292,1388084415,85,52,'plans','\0'),(293,1388084422,85,53,'plans','\0'),(294,1388086494,85,0,'plans','\0'),(296,1388086925,85,0,'plans','\0'),(297,1388086949,85,71,'plans','\0'),(298,1388089449,85,85,'users',''),(299,1388089462,85,209,'contacts','\0'),(300,1388089513,85,85,'users',''),(301,1388090324,0,72,'goals','\0'),(302,1388090345,0,73,'goals','\0'),(303,1388090488,0,74,'goals','\0'),(304,1388090574,0,75,'goals','\0'),(305,1388090678,0,76,'goals','\0'),(306,1388095948,0,77,'goals','\0'),(307,1388098769,85,72,'plans','\0'),(308,1388099806,85,73,'plans','\0'),(309,1388099812,85,73,'plans','\0'),(310,1388099828,85,73,'plans','\0'),(311,1388099851,85,69,'plans','\0'),(312,1388099858,85,74,'plans','\0');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plans` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `time` int(11) NOT NULL,
  `modified_date` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `public` bit(1) NOT NULL,
  `show` bit(1) NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` VALUES (52,'plan3',10000,1387618376,85,'',''),(53,'plan 4',200,1387618376,85,'',''),(55,'plan my',20483,1387919257,85,'','\0'),(56,'plan my',20483,1387919270,85,'','\0'),(57,'plan my',20483,1387919307,85,'','\0'),(58,'cooko',129,1387919434,85,'',''),(59,'seje',31231,1387919521,85,'','\0'),(60,'jjj',0,1387919684,85,'','\0'),(61,'u8u',888,1387919697,85,'','\0'),(62,'plan21',10000,1388065700,85,'',''),(63,'fdas',1111,1388065709,85,'','\0'),(64,'231',321,1388065716,85,'','\0'),(65,'paln',1111,1388084572,85,'','\0'),(66,'new',10000,1388086263,85,'','\0'),(67,'123',1111,1388086494,85,'','\0'),(68,'123',1111,1388086609,85,'','\0'),(69,'855',9,1388086741,85,'','\0'),(74,'fds',22,1388099858,85,'','\0');
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `modified_date` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `work` decimal(6,2) NOT NULL,
  `sleep` decimal(6,2) NOT NULL,
  `leisure` decimal(6,2) NOT NULL,
  `care` decimal(6,2) NOT NULL,
  `eat` decimal(6,2) NOT NULL,
  `house` decimal(6,2) NOT NULL,
  `free` decimal(6,2) NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (50,1387572925,0,5.00,3.00,3.00,3.00,1.00,1.00,0.00),(51,1387573035,0,5.00,3.00,3.00,3.00,1.00,1.00,0.00),(52,1387573551,0,9.00,5.00,3.00,3.00,1.00,1.00,0.00),(53,1387573600,0,9.00,5.00,3.00,3.00,1.00,1.00,0.00),(54,1387598885,0,9.00,2.00,3.00,3.00,1.00,1.00,0.00),(55,1387725356,0,9.00,5.00,3.00,3.00,1.00,1.00,0.00),(56,1387726033,0,9.00,5.00,3.00,3.00,1.00,1.00,0.00),(57,1387726200,0,9.00,5.00,3.00,3.00,1.00,1.00,0.00),(58,1387726260,0,9.00,5.00,3.00,3.00,1.00,1.00,0.00),(59,1387726453,0,9.00,6.00,3.00,3.00,1.00,1.00,0.00),(60,1387726546,0,9.00,6.00,3.00,3.00,1.00,1.00,0.00),(61,1387726582,0,9.00,5.00,3.00,3.00,1.00,1.00,0.00),(62,1387726585,0,9.00,5.00,3.00,3.00,1.00,1.00,0.00),(63,1387726666,0,9.00,6.00,3.00,3.00,1.00,1.00,0.00),(64,1387726840,0,9.00,6.00,3.00,3.00,1.00,1.00,0.00),(65,1387728021,0,9.00,4.00,3.00,3.00,1.00,1.00,0.00),(66,1387728736,0,9.00,4.00,3.00,3.00,1.00,1.00,0.00),(67,1387728767,0,9.00,4.00,3.00,3.00,1.00,1.00,0.00),(68,1387728771,0,9.00,4.00,3.00,3.00,1.00,1.00,0.00),(69,1387728791,0,9.00,4.00,3.00,3.00,1.00,1.00,0.00),(70,1387730642,0,5.00,8.00,3.00,3.00,1.00,1.00,0.00),(71,1387730644,0,5.00,8.00,3.00,3.00,1.00,1.00,0.00),(72,1387730726,0,6.00,8.00,3.00,3.00,1.00,1.00,0.00),(73,1387730745,0,6.00,8.00,3.00,3.00,1.00,1.00,0.00),(74,1387730867,0,9.00,4.00,3.00,3.00,1.00,1.00,0.00),(75,1387731034,0,9.00,6.00,3.00,3.00,1.00,1.00,0.00),(76,1387912632,0,8.80,5.10,2.60,2.80,1.10,1.00,0.00),(77,1387916105,0,5.30,7.70,2.60,2.80,1.10,1.00,0.00),(78,1387918874,0,8.80,4.60,2.60,2.80,1.10,1.00,0.00),(79,1387919887,0,8.80,4.80,2.60,2.80,1.10,1.00,0.00),(80,1387920012,0,8.80,4.80,2.60,2.80,1.10,1.00,0.00),(81,1387920182,85,8.80,4.80,2.60,2.80,1.10,1.00,0.00),(82,1387920311,85,8.80,4.80,2.60,2.80,1.10,1.00,0.00),(83,1388072908,85,8.80,5.40,2.60,2.80,1.10,1.00,0.00),(84,1388073128,85,8.80,3.80,2.60,2.80,1.10,1.00,0.00),(85,1388073158,85,8.80,3.80,2.60,2.80,1.10,1.00,0.00),(86,1388090323,85,8.80,4.00,2.60,2.80,1.10,1.00,0.00),(87,1388090345,85,8.80,4.00,2.60,2.80,1.10,1.00,0.00),(88,1388090488,154,8.80,4.50,2.60,2.80,1.10,1.00,0.00),(89,1388090574,85,8.80,7.70,2.60,0.90,1.10,1.00,0.00),(90,1388090678,154,8.80,7.70,2.60,0.80,1.10,1.00,0.00),(91,1388095948,154,8.80,6.10,2.60,0.80,1.10,1.00,0.00);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `modified_date` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` bit(1) DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `deleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (85,1388089462,'f95ab56d305eb65fa771245319e716dc2904953a','02091ef4c69ecbf14314189279c8b0f7120cc19d','admin@vielgi.biz','',85,'\0'),(86,1387618376,'56320f9ab26d8dac293973cc4e607f10bae673ae','02091ef4c69ecbf14314189279c8b0f7120cc19d','first.user@vielgi.com',NULL,0,'\0'),(87,1387823380,'2add8069b745eb7398a9b3b5ab37c8f1f4b54565','39453bc69c1b1bf64239baad3cc1ce72e9bbb87e','test@testok.com',NULL,0,'\0'),(88,1387830164,'35f4803ffdc64c8e4e5f24df46c125a064cab927','39453bc69c1b1bf64239baad3cc1ce72e9bbb87e','321@vielgi.com',NULL,0,'\0'),(89,1387831316,'9fd0c44843e4ca09cddd325bae6f9d6a603ecefe','39453bc69c1b1bf64239baad3cc1ce72e9bbb87e','lkjlkl@vielgi.com',NULL,0,'\0'),(90,1387898682,'a9cb78e2ab69feed3be4a43b0c5eaa60c6047946','02091ef4c69ecbf14314189279c8b0f7120cc19d','qwe@vielgi.com',NULL,0,'\0'),(91,1387898756,'e2326b6183b1fced1d7e6e77f25c2be206a2fe5c','02091ef4c69ecbf14314189279c8b0f7120cc19d','daa@vielgi.com',NULL,0,'\0'),(92,1387898830,'6470a79b072ad048bfe8d2024c7aac47dc7db234','02091ef4c69ecbf14314189279c8b0f7120cc19d','fda2121s@vielgi.com',NULL,0,'\0'),(93,1387899209,'6426c11235ebeb48eed45b279dc0653b71dfa4f8','02091ef4c69ecbf14314189279c8b0f7120cc19d','trew@vielgi.com',NULL,0,'\0'),(94,1387899299,'bef4727c56a5ec540e1f9b1dbe05924b84a16f29','02091ef4c69ecbf14314189279c8b0f7120cc19d','va@vielgi.com',NULL,0,'\0'),(95,1387899606,'ac48d6c6bb6e7757d4ce38b0357dd96f7bb87d80','02091ef4c69ecbf14314189279c8b0f7120cc19d','klj@gmail.com',NULL,0,'\0'),(96,1387900215,'5c5319c16b3ff820d5fcae8da7a79143e0344839','02091ef4c69ecbf14314189279c8b0f7120cc19d','2134@vielgi.com',NULL,0,'\0'),(97,1387900320,'744c408b4c923ed967c879fa3c8f9b739c5cefec','02091ef4c69ecbf14314189279c8b0f7120cc19d','432@vielgi.com',NULL,0,'\0'),(98,1387900503,'c171f6a26abdbe63b65446434460af84cf73c5b7','02091ef4c69ecbf14314189279c8b0f7120cc19d','3242342@vielgi.com',NULL,0,'\0'),(99,1387900916,'27cd0a284ef6d5eb5cd6ce552a7f4a962ceddd19','02091ef4c69ecbf14314189279c8b0f7120cc19d','112121va@vielgi.com',NULL,0,'\0'),(100,1387900980,'cab35b941d151c88ade5c0bcd9dd2f943d95bf43','7112fd14222115912b5b8d27491cd30cb48f03ac','112121sva@vielgi.com',NULL,0,'\0'),(101,1387901061,'721df0276a334c5a6465c14253d0d5e5dccf1b9e','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjklkl@vielgi.com',NULL,0,'\0'),(102,1387901149,'b1f8575e4712ac272726681d3f07acafac64f914','16db69cb9aa87088ee008da988454c1ff56a528b','112121sv2a@vielgi.com',NULL,0,'\0'),(103,1387901255,'3f43e9e28143ce62c60cdb2a5a943e40fe8a28d1','af42714beae48d045ee0ff05a17683f1d90e1654','1121211sv2a@vielgi.com',NULL,0,'\0'),(104,1387901425,'fb07a305da05dc13f199de6a4613935205ed2e31','02091ef4c69ecbf14314189279c8b0f7120cc19d','12312312312@vielgi.com',NULL,0,'\0'),(105,1387901629,'370e6b2e5ffce74505a956dcc6a327c7320e8e8f','02091ef4c69ecbf14314189279c8b0f7120cc19d','12312312312312321@vielgi.com',NULL,0,'\0'),(106,1387901692,'8e128f24b503c65177d5180fa5700c56a492bf8e','02091ef4c69ecbf14314189279c8b0f7120cc19d','l@vielgi.com',NULL,0,'\0'),(107,1387901814,'db84b263fbf6733038335cf4e02ecb7935841214','2dd1941bd7c00ba863fb30b2356c66cece951764','12312312321@vielgi.com',NULL,0,'\0'),(108,1387901897,'b918662753360afce8b3e243a97bc62c988f7bf1','e19efdd30c13f8ba0274b69bcb114dc67ff9138b','1231231223123@vielgi.com',NULL,0,'\0'),(109,1387902003,'8a82948dfed97adf21cefcd4862825843e1e3858','02091ef4c69ecbf14314189279c8b0f7120cc19d','312312@vielgi.com',NULL,0,'\0'),(110,1387904238,'b454e4f07ad95f072306223b5b01625c9c2e3b65','02091ef4c69ecbf14314189279c8b0f7120cc19d','12221@vielgi.com',NULL,0,'\0'),(111,1387904369,'fa4628ce300833b1899803c346dee375bb694da5','02091ef4c69ecbf14314189279c8b0f7120cc19d','sas@vielgi.com',NULL,0,'\0'),(112,1387904431,'d78d2f5418adf333a7c54ef577da64a2724239ab','02091ef4c69ecbf14314189279c8b0f7120cc19d','da.da@vielgi.com',NULL,0,'\0'),(113,1387904474,'7e0dd680e29b2c37f85269f2bc43d63848d252b6','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','fad123@vielgi.com',NULL,0,'\0'),(114,1387904527,'2f77edcb51e80ce4d0a362a4b77593e823837d49','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','fdsasadf.d@vielgi.com',NULL,0,'\0'),(115,1387904649,'3edac32c91c9018f24e769cae2ded538c4ddee5d','02091ef4c69ecbf14314189279c8b0f7120cc19d','fdasfads@vielgi.com',NULL,0,'\0'),(116,1387904760,'daf5d748bddeac862c496a9b5df025113d198e66','02091ef4c69ecbf14314189279c8b0f7120cc19d','eeeevielgi@vielgi.com',NULL,0,'\0'),(117,1387904820,'a735fa89004c4095dcbc5ff596e0764bd90066cc','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','lkjlkll@vielgi.com',NULL,0,'\0'),(118,1387905084,'9bf9f6d0523a159c9447609166c2231a4e554ccc','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','fasiior1@vielgi.com',NULL,118,'\0'),(119,1387906443,'3cd4fd4262fe8a8e85e2bc24986d914db1ab5aa1','02091ef4c69ecbf14314189279c8b0f7120cc19d','123123123122@vielgi.com1',NULL,119,'\0'),(120,1387907286,'a085035f7c2beb5f8f2d63e3a1702e1162e9d27b','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','ddd@vielgi.com',NULL,0,'\0'),(121,1387907410,'594f9e45d2aaa4b1513538f3691ca0f2f2e578b7','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','3211k2312lk@vielgi.com',NULL,0,'\0'),(122,1387907719,'61cf215f9f30d31fef19f963f526a8f4f5382e9e','02091ef4c69ecbf14314189279c8b0f7120cc19d','3213212dd@vielgi.com',NULL,0,'\0'),(123,1387907878,'fa25dbe5d952bdac21f2e647f37c6e2e0a48f0de','02091ef4c69ecbf14314189279c8b0f7120cc19d','kkkjiiii@vielgi.com',NULL,0,'\0'),(124,1387907931,'3888635bf10d1764f58ba4cc293492527515fcd3','02091ef4c69ecbf14314189279c8b0f7120cc19d','123@vielgi.com',NULL,0,'\0'),(125,1387908013,'b6ed518f759baef81906c0ed7e121ee318a5e08c','02091ef4c69ecbf14314189279c8b0f7120cc19d','veaddd@vielgi.com',NULL,0,'\0'),(126,1387908116,'b8049ea750c30bc65f6329dff2088101b965a3ba','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','kkkiweee@vielgi.com',NULL,0,'\0'),(127,1387908172,'28174022c27e9f787f209564371e72b8f3d4ee19','02091ef4c69ecbf14314189279c8b0f7120cc19d','kkjiiiiiii@vielgi.com',NULL,0,'\0'),(128,1387908602,'8899e19ada15548ebc5949a6aeb3e78a0f63461b','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','sasafafa@vielgi.com',NULL,0,'\0'),(129,1387909014,'39139d11df48a6c04a0d8b564ec897635d57d576','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','kkjlkli2@vielgi.com',NULL,0,'\0'),(130,1387909156,'4b563160fff38cb4e70d41dec866ac354c8840a2','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','lkjkjlkjjkl@vielgi.com',NULL,0,'\0'),(131,1387909497,'2dd1de4edec2eb494176fad209566f2a1f4f2140','02091ef4c69ecbf14314189279c8b0f7120cc19d','last123@vielgi.com',NULL,0,'\0'),(132,1387909744,'988a39f43b8749a19b079bfabf699f9762047ea6','02091ef4c69ecbf14314189279c8b0f7120cc19d','32122sss@vielgi.com',NULL,0,'\0'),(133,1387910093,'0ea9679fd928f1fb7a01eda35ea057d759d15af9','02091ef4c69ecbf14314189279c8b0f7120cc19d','llkiiuoiuoi@vielgi.com',NULL,0,'\0'),(134,1387910207,'4abb9c342b91bf2a920293ed2255fe5995f3cfdd','02091ef4c69ecbf14314189279c8b0f7120cc19d','faf1432a@vielgi.com',NULL,0,'\0'),(135,1387910343,'05a2e78ff9b0a3a875301757bfad74c494eb7fa0','02091ef4c69ecbf14314189279c8b0f7120cc19d','sa.fa23@vielgi.com',NULL,0,'\0'),(136,1387910431,'d265183cfb4f98f2fb37b8302f0f89d43ff9f5a1','02091ef4c69ecbf14314189279c8b0f7120cc19d','klkllkjkkiii@vielgi.com',NULL,0,'\0'),(137,1387913505,'0810118b3b67c88d52608bf0cb982a7785bbd7ef','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjlkjlkjlkj@vielgi.com',NULL,0,'\0'),(138,1387913613,'fb92f45d9321c896c93df888f858f0c767de1a35','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjlkjl212k@vielgi.com',NULL,0,'\0'),(139,1387913695,'717f9407b025edc75547942848cfebce46635c5b','48b1b84d91f549bfcff9b1d00f45d4fe05392d81','lkjlkjlkjlkuii@vielgi.com',NULL,0,'\0'),(140,1387913807,'bf44e6553b529a8c59f6c2c97c263da65d17e0cd','02091ef4c69ecbf14314189279c8b0f7120cc19d','kljlkjlkjlkjii@vielgi.com',NULL,0,'\0'),(141,1387913914,'d085aebffae1850126bb28c98431c9387b3b3788','02091ef4c69ecbf14314189279c8b0f7120cc19d','kjlkjkijiii@vielgi.com',NULL,0,'\0'),(142,1387913940,'98a1316e8b13f95a82c70e9b7acfe35a2d91545b','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjlkjljlkjlkjjiiii@vielgi.com',NULL,0,'\0'),(143,1387914065,'f3aa3229b5722e26d2ba463ec4fdbee21840ea7c','02091ef4c69ecbf14314189279c8b0f7120cc19d','kljjlkjlkjlkkjljklk@vielgi.com',NULL,0,'\0'),(144,1387914135,'3810f4e58a135b086bd617d51c4322795cffc007','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjljkljjlkjlkjlkjlkljkl@vielgi.com',NULL,0,'\0'),(145,1387914201,'cd2c6bc84c3a5a1fa41ebacd933283dd4285f4a2','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjlkjkljlkjkjl@vielgi.com',NULL,0,'\0'),(146,1387914345,'9c8e7c45c477711a5d461e2c222cdd63e01c44cb','02091ef4c69ecbf14314189279c8b0f7120cc19d','kjlljijijlijijhbuhujkhkjuh@vielgi.com',NULL,0,'\0'),(147,1387914990,'0af635aeec185eb3089126cc4ed8873a75c16e5f','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjlkjlkjlkjklklk@vielgi.com',NULL,0,'\0'),(148,1387915069,'e47c40557d84a218a262531f8d22c0750a569ffb','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjlkjlkjjk@vielgi.com',NULL,0,'\0'),(149,1387916182,'79d11f2ddab8d7f6c50aa23707c90fc95976ac30','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjlkjlkkjkl@vielgi.com',NULL,0,'\0'),(150,1387916286,'ed5a32efccdfde82f97585d66d77aed5d274a8e0','02091ef4c69ecbf14314189279c8b0f7120cc19d','one.more.222@vielgi.com',NULL,0,'\0'),(151,1387916417,'775a328ed69da43eabc0e4fded62a46eb475d56f','02091ef4c69ecbf14314189279c8b0f7120cc19d','dsaas.dafdsaf@vielgi.com',NULL,0,'\0'),(152,1387916511,'05cc0611f6c87ae9b91c6155b76c90e779c41ac7','02091ef4c69ecbf14314189279c8b0f7120cc19d','kljlkjlkjlkjddddlkk@vielgi.com',NULL,0,'\0'),(153,1388073861,'597ca6c2b04caf04693a997ae9e8bb4e9d6c026c','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjfadslkjfladjsoi2342342sd@vielgi.com',NULL,0,'\0'),(154,1388074284,'371ee510a1a03ab6217dc049bc3c71de3384b61d','89774a045e7b0e376c00c3aa3c7f8aad3b63c2a5','43212xxxx13132@vielgi.com',NULL,0,'\0'),(155,1388074997,'68a7969367ce326f2e6ee447d570d9c9c73ef0fe','02091ef4c69ecbf14314189279c8b0f7120cc19d','lkjlkjlkjlxxxxxkjlklk@vielgi.com',NULL,0,'\0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-26 22:25:22
