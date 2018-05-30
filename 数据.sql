-- MySQL dump 10.13  Distrib 5.7.11, for Win32 (AMD64)
--
-- Host: localhost    Database: shopping
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `active`
--

DROP TABLE IF EXISTS `active`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `active` (
  `name` tinyint(4) NOT NULL DEFAULT '0',
  `time` varchar(30) DEFAULT '0',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `active`
--

LOCK TABLES `active` WRITE;
/*!40000 ALTER TABLE `active` DISABLE KEYS */;
INSERT INTO `active` VALUES (2,'1527838956');
/*!40000 ALTER TABLE `active` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cates`
--

DROP TABLE IF EXISTS `cates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cates`
--

LOCK TABLES `cates` WRITE;
/*!40000 ALTER TABLE `cates` DISABLE KEYS */;
INSERT INTO `cates` VALUES (26,'巧克力/果冻',0,'0'),(25,'糖果/蜜饯',0,'0'),(24,'坚果/炒货',0,'0'),(23,'素食/卤味',0,'0'),(22,'熟食/肉类',0,'0'),(21,'饼干/膨化',0,'0'),(20,'点心/蛋糕',0,'0'),(27,'海味/河鲜',0,'0'),(28,'酒水茶叶',0,'0'),(29,'进口零食',0,'0'),(30,'南北干货',0,'0'),(31,'绿色果蔬',0,'0'),(32,'山珍菌类',0,'0'),(33,'粮油土产',0,'0'),(34,'香料调料',0,'0'),(35,'苗木花卉',0,'0'),(36,'蛋糕',20,'0,20'),(38,'点心',20,'0,20'),(39,'饼干',21,'0,21'),(40,'膨化类',21,'0,21'),(41,'猪肉制品',22,'0,22'),(43,'牛肉',22,'0,22'),(89,'猪蹄',41,'0,22,41'),(45,'豆制品',23,'0,23'),(46,'干笋',23,'0,23'),(90,'豆干',45,'0,23,45'),(48,'坚果',24,'0,24'),(49,'炒货',24,'0,24'),(50,'糖果',25,'0,25'),(51,'蜜饯',25,'0,25'),(52,'巧克力',26,'0,26'),(53,'果冻',26,'0,26'),(107,'鱼类',105,'0,27,105'),(109,'啤酒',57,'0,28,57'),(105,'海鲜',27,'0,27'),(57,'酒类',28,'0,28'),(58,'茶叶',28,'0,28'),(112,'日本',29,'0,29'),(111,'欧美',29,'0,29'),(62,'腊味',30,'0,30'),(117,'三关牧村',64,'0,31,64'),(64,'车厘子',31,'0,31'),(65,'青红脆李',31,'0,31'),(66,'羊肚菌',32,'0,32'),(67,'藏地秘宝',32,'0,32'),(68,'清油',33,'0,33'),(69,'杂粮',33,'0,33'),(73,'红景天',35,'0,35'),(71,'大红袍',34,'0,34'),(72,'辣椒',34,'0,34'),(74,'灵芝',35,'0,35'),(75,'巧克力蛋糕',36,'0,20,36'),(76,'乳酪蛋糕',36,'0,20,36'),(77,'曲奇',38,'0,20,38'),(78,'中式点心',38,'0,20,38'),(79,'威化饼',39,'0,21,39'),(80,'夹心饼干',39,'0,21,39'),(83,'锅巴',40,'0,21,40'),(84,'虾片类',40,'0,21,40'),(85,'薯片类',40,'0,21,40'),(86,'猪肉脯',41,'0,22,41'),(87,'牛肉片',43,'0,22,43'),(88,'牛蹄筋',43,'0,22,43'),(91,'竹笋',46,'0,23,46'),(92,'栗子',48,'0,24,48'),(93,'核桃',48,'0,24,48'),(94,'瓜子',49,'0,24,49'),(95,'花生',49,'0,24,49'),(96,'软糖',50,'0,25,50'),(98,'硬糖',50,'0,25,50'),(99,'梅类',51,'0,25,51'),(100,'山楂类',51,'0,25,51'),(101,'牛奶巧克力',52,'0,26,52'),(102,'原味巧克力',52,'0,26,52'),(103,'果冻布丁',53,'0,26,53'),(104,'龟苓膏',53,'0,26,53'),(108,'海苔类',105,'0,27,105'),(113,'提拉米苏',111,'0,29,111'),(110,'红藏茶',58,'0,28,58'),(114,'寿司',112,'0,29,112'),(115,'腊肉',62,'0,30,62'),(116,'香肠',62,'0,30,62'),(118,'东界脑村',64,'0,31,64'),(119,'青脆李',65,'0,31,65'),(120,'高原红脆李',65,'0,31,65'),(121,'九寨沟',66,'0,32,66'),(122,'阿坝州',66,'0,32,66'),(123,'野生鹅蛋菌',67,'0,32,67'),(124,'杨柳菌',67,'0,32,67'),(125,'大红袍花椒',71,'0,34,71'),(126,'花生辣椒肉酱',72,'0,34,72');
/*!40000 ALTER TABLE `cates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flink`
--

DROP TABLE IF EXISTS `flink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flink`
--

LOCK TABLES `flink` WRITE;
/*!40000 ALTER TABLE `flink` DISABLE KEYS */;
INSERT INTO `flink` VALUES (1,'http://www.baidu.com','膨化食品有限公司','2');
/*!40000 ALTER TABLE `flink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membersys`
--

DROP TABLE IF EXISTS `membersys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membersys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `benefits` varchar(255) DEFAULT '0',
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membersys`
--

LOCK TABLES `membersys` WRITE;
/*!40000 ALTER TABLE `membersys` DISABLE KEYS */;
/*!40000 ALTER TABLE `membersys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `linkman` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `code` char(6) NOT NULL,
  `phone` char(11) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `total` double(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `pic` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (45,'21cake 乳酪芝士蛋糕',76,'/uploads/shop/2018-05-27/t_15274149654420.jpg','<p>21cake 杰瑞生日蛋糕 乳酪芝士蛋糕 1磅--满二件8折--198.00--230.00--100--320--200--奶酪味,青草味--礼盒单人份,礼盒双人份</p>',10,0),(44,'21cake 巧克力蛋糕',75,'/uploads/shop/2018-05-27/t_15274144336712.jpg','<p>（21cake）黑方生日蛋糕 巧克力蛋糕 生日蛋糕配送 2磅--满二件8折满三件7折--298.00--350.00--1000--2300--5000--巧克力味,奶牛味--手袋单人份,礼盒双人份</p>',12,0),(47,'友享爆酱曲奇',77,'/uploads/shop/2018-05-27/t_15274165385896.jpg','<p>友享爆酱曲奇（牛奶蛋羹味）*250g约14包--满三袋8折--15.00--18.00--1000--3500--230--牛奶蛋羹味,牛奶蔓越莓味--袋装</p>',1000,1),(48,'小麻花',78,'/uploads/shop/2018-05-27/t_1527417564549.jpg','<p>爱尚小芳芳真味小麻花经典原味280g--满十斤8折--9.50--12.80--100--1200--100--经典原味,甜味--袋装</p>',1000,1),(49,'椰糯糕',78,'/uploads/shop/2018-05-27/t_15274178288396.jpg','<p>春光椰糯糕*250g约18袋--满5斤8折--12.80--14.80--100--230--120--糯香味--袋装</p>',120,0),(50,'威化饼干',79,'/uploads/shop/2018-05-28/t_15274656144745.jpg','<p>莱家粒粒威化提拉米苏味110g--二袋8折--16.00--18.00--100--350--120--提拉米苏味,榛子味,卡布奇诺味--袋装</p>',1200,0),(51,'夹心饼干',80,'/uploads/shop/2018-05-28/t_15274661338142.jpg','<p>汇巢泰国风味果酱夹心饼干菠萝味*250g约5个--3袋8折--6.00--7.50--3050--5600--230--菠萝味--袋装</p>',1230,0),(52,'果酱夹心饼干蓝莓味',22,'/uploads/shop/2018-05-28/t_15274664948697.jpg','<p>汇巢泰国风味果酱夹心饼干蓝莓味*250g约5个--3袋8折--6.00--7.50--1200--2300--200--蓝莓味,菠萝味--袋装</p>',230,0),(53,'蟹香锅巴',83,'/uploads/shop/2018-05-28/t_15274674571356.jpg','<p>水军蟹香锅巴蛋黄味*500g约11小袋--3斤8折--36.00--48.00--1200--3555--230--蛋黄味,海鲜味--袋装</p>',2300,0),(54,'咪咪虾味条',84,'/uploads/shop/2018-05-28/t_15274677251584.jpg','<p>咪咪虾味条20g--10袋9折--0.40--0.50--3000--12000--330--虾味,蟹味,蒜香味--袋装</p>',30000,0),(55,'薯片',85,'/uploads/shop/2018-05-28/t_15274682228650.jpg','<p>乐事清新清爽薯片翡翠黄瓜味104克--暂无--7.50--8.50--200--350--120--黄瓜味,番茄味--袋装</p>',1200,0),(56,'喜友纯脆猪肉脯',86,'/uploads/shop/2018-05-28/t_15274690189376.jpg','<p>喜友纯脆猪肉脯100g--暂无--22.80--24.80--1200--2300--210--肉香味,香辣味--真空包装</p>',200,0),(57,'暨阳猪蹄',89,'/uploads/shop/2018-05-28/t_15274692714777.jpg','<p>暨阳猪蹄*250g--5袋8折--18.50--22.00--200--3200--120--香辣味--真空袋装</p>',230,0),(58,'酱卤牛肉',87,'/uploads/shop/2018-05-28/t_15274695413418.jpg','<p>麦尚我不吹牛香辣味酱卤牛肉*100g约6包--暂无--12.50--14.80--2000--3200--200--卤腊味--真空袋装</p>',1200,0),(59,'香辣牛蹄筋',87,'/uploads/shop/2018-05-28/t_15274697548429.jpg','<p>泰优美香辣牛蹄筋*250g约8袋--暂无--32.50--35.00--1200--3200--200--香辣味--真空袋装</p>',2000,0),(60,'有又卤香豆干',90,'/uploads/shop/2018-05-28/t_15274703842801.jpg','<p>又有卤香豆干100g--暂无--2.70--3.90--230--3000--120--卤香味--真空袋装</p>',1200,0),(61,'香菇豆干',90,'/uploads/shop/2018-05-28/t_15274706001416.jpg','<p>有友香菇豆干香辣味80g--暂无--2.80--5.00--230--3000--126--香辣味--真空袋装</p>',12000,0),(62,'金针菇',91,'/uploads/shop/2018-05-28/t_15274708168428.jpg','<p>金大洲孜然烧烤味金针菇*100g约5袋--暂无--5.00--6.50--120--3000--200--烧烤味--真空袋装</p>',3000,0),(63,'有友竹笋',91,'/uploads/shop/2018-05-28/t_15274709658113.jpg','<p>又有竹笋香辣味80g--暂无--3.00--4.50--200--2300--120--香辣味--真空袋装</p>',2000,0),(64,'栗仁',92,'/uploads/shop/2018-05-28/t_15274713484666.jpg','<p>佳栗福甘栗仁180g--暂无--12.00--14.00--120--2000--120--糯香味--袋装</p>',120,0),(65,'扁桃仁',93,'/uploads/shop/2018-05-28/t_15274716835258.jpg','<p>森宝香脆扁桃仁*500g散称约18小袋--暂无--39.00--45.00--1200--23000--200--清香味--真空袋装</p>',2000,0),(66,'南瓜子',94,'/uploads/shop/2018-05-28/t_1527471843774.jpg','<p>芳草原味香脆南瓜子*250g--暂无--9.80--12.80--1200--2300--100--芳草原味--袋装</p>',1230,0),(67,'苏太太醉香食尚花生',95,'/uploads/shop/2018-05-28/t_15274721305443.jpg','<p>苏太太醉香食尚花生原味*260g--暂无--9.00--10.00--1200--3000--12--花生原味--真空袋装</p>',2000,0),(68,'优酷蓝色可乐味软糖',96,'/uploads/shop/2018-05-28/t_15274726477009.jpg','<p>优酷蓝色可乐味软糖*240g--暂无--11.50--14.80--1200-2300--230--可乐味--真空袋装</p>',2300,0),(69,'黑莓加梨味硬糖',98,'/uploads/shop/2018-05-28/t_15274729021440.jpg','<p>嘉运糖黑莓加梨味硬糖200g--暂无--14.00--21.00--230--3000--210--黑莓加梨味--真空袋装</p>',2000,0),(70,'原味山楂球',100,'/uploads/shop/2018-05-28/t_15274731408986.jpg','<p>金悦原味山楂球*250g--暂无--7.00--8.50--2000--4500--200--原味--真空袋装</p>',3000,0),(71,'蜂蜜杨梅',99,'/uploads/shop/2018-05-28/t_15274733552512.jpg','<p>雪海梅香蜂蜜杨梅*250g--袋装--8.50--9.50--300--530--10--原味--真空袋装</p>',2300,0),(72,'奇趣巧克力',101,'/uploads/shop/2018-05-28/t_15274738198680.jpg','<p>健达奇趣蛋女孩版20g--暂无--6.90--9.50--1200--3000--100--巧克力味--锡纸装</p>',120,0),(73,'雪吻巧克力',102,'/uploads/shop/2018-05-28/t_1527474035752.jpg','<p>明治雪吻巧克力33g--暂无--10.00--12.50--1200--3000--120--原味--盒装</p>',2300,0),(74,'巧妈妈鸡蛋不点优酪果冻',103,'/uploads/shop/2018-05-28/t_15274742225907.jpg','<p>巧妈妈鸡蛋不点优酪果冻125g--暂无--4.00--5.00--2000--3500--120--水果味--真空包装</p>',300,0),(75,'龟苓膏',104,'/uploads/shop/2018-05-28/t_15274743848353.jpg','<p>和盛堂原味龟苓膏215g--暂无--3.20--4.50--1200--3000--120--原味--真空包装</p>',300,0),(76,'矶烧鱼皮',107,'/uploads/shop/2018-05-28/t_15274759219396.jpg','<p>自然派矶烧鱼皮60g--暂无--11.50--13.00--1200--3000-100--香辣味--袋装</p>',1000,0),(77,'海牌海苔',108,'/uploads/shop/2018-05-28/t_15274761293004.jpg','<p>海牌海苔16g--暂无--8.00--16.00--3000--12000--230--海的味道--真空包装</p>',2000,0),(78,'雪花啤酒',109,'/uploads/shop/2018-05-28/t_1527476684588.jpg','<p>雪花啤酒清爽型330ml--暂无--2.40--2.80--1200--3500--100--清爽味--灌装</p>',1200,0),(79,'夏果蜂蜜红藏茶',110,'/uploads/shop/2018-05-28/t_15274769054879.jpg','<p>夏果蜂蜜红藏茶30g--暂无--2.20--5.00--1200--3200--100--茶味--真空包装</p>',3400,0),(80,'提拉米苏',113,'/uploads/shop/2018-05-28/t_15274776158995.jpg','<p>来家粒粒威化提拉米苏味110g--暂无--16.00--18.00--1200--3000--20--提拉米苏味--真空袋装</p>',1000,0),(81,'寿司',114,'/uploads/shop/2018-05-28/t_15274778003282.jpg','<p>Kranie寿司造型手工糖28.5g--暂无--27.00--35.00--120--2300--100--原味--真空袋装</p>',1000,0),(82,'藏香猪腊肉',115,'/uploads/shop/2018-05-28/t_15274783601968.jpg','<p>藏香猪腊肉--暂无--89.00--99.00--100--3200--120--香腊味--普通袋装</p>',1200,0),(83,'状元黑香肠',116,'/uploads/shop/2018-05-28/t_15274792427765.jpg','<p>状元黑香肠450g--暂无--56.00--60.00--1200--3400--120--腊味--真空包装</p>',1000,1),(84,'青脆李',119,'/uploads/shop/2018-05-28/t_15274804739048.jpg','<p>青脆李--暂无--6.00--7.00--1200--3000--120--酸甜味--袋装</p>',300,1),(85,'高原红脆李子',120,'/uploads/shop/2018-05-28/t_15274806446125.jpg','<p>高原红脆李子--暂无--9.00--10.00--1200--3000--120--酸甜味--袋装</p>',1200,0),(86,'三关牧村车厘子',0,'/uploads/shop/2018-05-28/t_15274808779202.jpg','<p>【康样汶川特产专区】三关牧村车厘子--暂无--30.00--40.00--120--350--120--香甜味--真空包装</p>',120,0),(87,'三关牧村车厘子',117,'/uploads/shop/2018-05-28/t_15274810548232.jpg','<p>【康样汶川特产专区】三关牧村车厘子--暂无--30.00--40.00--1200--3500--120--甜味--袋装</p>',1200,0),(88,'东界脑村车厘子',118,'/uploads/shop/2018-05-28/t_15274812338691.jpg','<p>【康样汶川特产专区】东界脑村车厘子--暂无--30.00--40.00--1300--4300--300--甜味--袋装</p>',3000,0),(89,'野生鹅蛋菌',123,'/uploads/shop/2018-05-28/t_15274817591780.jpg','<p>野生鹅蛋菌--暂无--118.00--128.00--120--350--130--菌味--真空包装</p>',300,0),(90,'野生杨柳菌',124,'/uploads/shop/2018-05-28/t_15274818737847.jpg','<p>野生杨柳菌--暂无--186.00--226.00--1200--3600--200--菌味--真空包装</p>',3000,0),(91,'羊肚菌',121,'/uploads/shop/2018-05-28/t_15274820342018.jpg','<p>羊肚菌50g--暂无--129.00--150.00--200--500--130--菌味--真空包装</p>',300,0),(92,'野生羊肚菌',122,'/uploads/shop/2018-05-28/t_15274821542062.jpg','<p>野生羊肚菌--暂无--90.00--99.00--120--3600--10--菌味--真空包装</p>',300,0),(93,'大红袍花椒',125,'/uploads/shop/2018-05-28/t_152748448876.jpg','<p>大红袍花椒--暂无--30.00--35.00--100--3230--200--麻味--袋装</p>',3200,0),(94,'明治雪吻巧克力',101,'/uploads/shop/2018-05-30/t_15276544172651.jpg','<p>明治雪吻巧克力 多口味夹心巧克力新品上市--暂无--19.80--23.00--1200--3500--120--多口味--婚庆礼盒,情人节礼品</p>',1200,0),(95,'明治雪吻巧克力',101,'/uploads/shop/2018-05-30/t_15276548792290.jpg','<p>明治雪吻巧克力 牛奶口味1000g--暂无--94.50--100.00--200--3500--91--牛奶味--礼盒装</p>',1300,0),(96,'明治雪吻巧克力',101,'/uploads/shop/2018-05-30/t_15276551181642.png','<p>明治雪吻巧克力牛奶口味散装500g--暂无--45.00--52.00--460--5000--461--牛奶口味--散装</p>',1200,0),(97,'明治雪吻巧克力',101,'/uploads/shop/2018-05-30/t_15276627175164.png','<p>明治雪吻巧克力圣诞节糖果 牛奶口味1kg--暂无--94.50--96.00--230--3600--218--牛奶口味--袋装</p>',2000,0),(98,'明治雪吻巧克力',101,'/uploads/shop/2018-05-30/t_15276629016381.jpg','<p>明治雪吻巧克力1kg整袋--暂无--96.00--98.00--200--3000--875--蓝莓,草莓,抹茶--袋装</p>',3200,0),(99,'魔吻黑巧克力',102,'/uploads/shop/2018-05-30/t_15276631442505.jpg','<p>魔吻（AMOVO）黑巧克力礼盒装--暂无--119.00--120.00--200--3900--2732--原味--礼盒装</p>',320,0),(100,'明治巧克力',102,'/uploads/shop/2018-05-30/t_15276633286721.jpg','<p>明治巧克力脆75g/盒--暂无--9.90--10.00--120--3000--233--原味--盒装</p>',2300,0),(101,'明治雪吻巧克力',102,'/uploads/shop/2018-05-30/t_15276635091037.jpg','<p>明治雪吻巧克力喜糖糖果一斤--暂无--48.90--50.00--300--3400--1074--原味--散装</p>',300,0),(102,'费列罗巧克力',102,'/uploads/shop/2018-05-30/t_15276636663683.jpg','<p>费列罗巧克力礼盒情人节礼品果糖290g--暂无--99.00--100.00--1200--34000--1420211--原味--礼盒装</p>',3400,0),(103,'明治巧克力',102,'/uploads/shop/2018-05-30/t_15276638982284.jpg','<p>明治黑巧克力65克*10版特纯黑巧克力--暂无--98.00--100.00--1200--3400--23--原味--散装</p>',3300,0),(104,'蜜橘果冻',103,'/uploads/shop/2018-05-30/t_15276641466937.jpg','<p>喜之郎蜜橘果冻450g 加送60g--暂无--14.90--15.00--230--3500--120--蜜桔味--散装</p>',3000,0),(105,'椰果果冻',103,'/uploads/shop/2018-05-30/t_15276643186573.jpg','<p>椰果肉补丁480g 6杯--暂无--16.80--18.00--200--2000--120--混合口味--散装</p>',430,0),(106,'樱桃小丸子果冻',103,'/uploads/shop/2018-05-30/t_15276644822534.jpg','<p>樱桃小丸子果冻--暂无--50.00--60.00--320--3000--21--涮奶味--散装</p>',300,0),(107,'黑糖果冻',103,'/uploads/shop/2018-05-30/t_15276646835743.jpg','<p>柚木黑糖纤畅果冻 正品果冻--暂无--336.00--340.00--300--5300--320--黑糖味--散装</p>',5300,0),(108,'荔枝果冻',103,'/uploads/shop/2018-05-30/t_15276649596231.jpg','<p>荔枝果冻 265g 3包--暂无--43.00--45.00--320--3000--321--3包装</p>',330,0),(109,'瑞士糖',96,'/uploads/shop/2018-05-30/t_15276652062278.jpg','<p>瑞士糖混合水果口味--暂无--29.80--32.00--120--3200--200--混合水果味--袋装</p>',320,0),(110,'阿尔卑斯奶糖',98,'/uploads/shop/2018-05-30/t_15276654048263.jpg','<p>阿尔卑斯硬糖（约250颗）--暂无--58.00--60.00--320--5000--230--葡萄,草莓--散袋装</p>',3000,0),(111,'益达口香糖',96,'/uploads/shop/2018-05-30/t_15276655711551.jpg','<p>益达口香糖水果味56g*6--暂无--49.90--50.00--300--5400--513--水果味--瓶装</p>',3200,0),(112,'中国台湾特产牛轧糖',98,'/uploads/shop/2018-05-30/t_15276657295627.jpg','<p>中国台湾特产进口零食牛轧糖400g--暂无--96.00--100.00--300--65300--3233--原味--礼盒装</p><p>&nbsp;</p>',33000,0),(113,'无糖口香糖',96,'/uploads/shop/2018-05-30/t_15276659586673.jpg','<p>5无糖口香糖立方酷酸草莓味40g--暂无--8.80--10.00--210--33200--3221--酸草莓味--单瓶装</p>',3300,0),(114,'三只松鼠蜜饯',99,'/uploads/shop/2018-05-30/t_15276679616829.jpg','<p>三只松鼠蜜饯果干休闲零食116g--暂无--10.90--11.00--120--3500--21--芒果味--袋装</p>',400,0),(115,'高山森林蓝莓干',99,'/uploads/shop/2018-05-30/t_1527668179169.jpg','<p>高山森林蓝莓干蜜饯--暂无--39.90--42.00--120--3900--32--蓝莓味--袋装</p>',500,0),(116,'自然派青梅蜜饯',99,'/uploads/shop/2018-05-30/t_1527668539632.jpg','<p>自然派青梅250g清脆青梅果干蜜饯--暂无--14.90--15.60--200--3400--21--青梅味--袋装</p>',3400,0),(117,'阿联酋椰枣蜜饯',100,'/uploads/shop/2018-05-30/t_1527668738512.jpg','<p>阿联酋椰枣蜜饯300g 进口果干蜜饯--暂无--21.90--22.00--30--4300--200--椰枣味--真空袋装</p>',3200,0),(118,'胜奎山楂蜜饯',100,'/uploads/shop/2018-05-30/t_15276689208162.jpg','<p>胜奎山楂蜜饯 零食大礼包--暂无--39.00--41.00--120--3200--120--山楂味--真空包装</p>',1000,0);
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `name` varchar(80) NOT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '2',
  `birth` varchar(255) NOT NULL,
  `phone` char(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfo`
--

LOCK TABLES `userinfo` WRITE;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` VALUES (1,5,'username','woman',0,'2016-1-2','13516780750','123456@qq.com','/uploads/user/2018-05-28/t_15274900676021.jpeg');
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'admin','$2y$10$KaiWhIW9cCULgepgao8lvOXf7AvrM7n08JAg3mLEh5f/ihfzLzNta','123456@qq.com',3,'SskGjzqs5TvFfxx7RVhvJvfYc4xtwvGFn15kLJqu');
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

-- Dump completed on 2018-05-30 19:22:35
