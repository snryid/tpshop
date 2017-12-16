/*
Navicat MySQL Data Transfer

Source Server         : phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : tpshop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-12-16 09:31:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for shop_admin
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE `shop_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_admin
-- ----------------------------

-- ----------------------------
-- Table structure for shop_brand
-- ----------------------------
DROP TABLE IF EXISTS `shop_brand`;
CREATE TABLE `shop_brand` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌id',
  `brand_name` varchar(60) NOT NULL COMMENT '品牌名称',
  `brand_url` varchar(60) NOT NULL COMMENT '品牌地址',
  `brand_img` varchar(100) NOT NULL COMMENT '品牌logo',
  `brand_description` varchar(255) NOT NULL COMMENT '品牌描述',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '品牌排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:显示 0：隐藏',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='商品品牌表';

-- ----------------------------
-- Records of shop_brand
-- ----------------------------
INSERT INTO `shop_brand` VALUES ('1', '百度', 'www.baidu.com', '', '百度描述', '50', '1');
INSERT INTO `shop_brand` VALUES ('2', '百度2', 'www.baidu2.com', '20171017\\c2ff3170b8ebdac53e387bcdbb922984.png', '百度2描述', '50', '1');

-- ----------------------------
-- Table structure for shop_conf
-- ----------------------------
DROP TABLE IF EXISTS `shop_conf`;
CREATE TABLE `shop_conf` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '商城配置表',
  `value` varchar(255) DEFAULT NULL,
  `ename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_conf
-- ----------------------------

-- ----------------------------
-- Table structure for shop_goods_list
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods_list`;
CREATE TABLE `shop_goods_list` (
  `goods_id` int(15) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goods_name` varchar(255) NOT NULL COMMENT '商品名称',
  `goods_code` varchar(255) NOT NULL COMMENT '商品货号',
  `goods_class` int(15) NOT NULL COMMENT '商品分类id',
  `brand_id` int(15) NOT NULL COMMENT '商品品牌id',
  `goods_url` varchar(255) DEFAULT NULL COMMENT '商品缩略图',
  `is_new` int(2) DEFAULT '0' COMMENT '是否新品  0：不是，1：是',
  `is_boutique` int(2) DEFAULT '0' COMMENT '是否精品 0：不是，1：是',
  `is_hot_sale` int(2) DEFAULT '0' COMMENT '是否热卖 0：不是，1：是',
  `goods_price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `goods_repertory` int(20) NOT NULL DEFAULT '0' COMMENT '商品库存',
  `is_status` int(1) NOT NULL DEFAULT '0' COMMENT '商品上架状态 0：下架，1：上架',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品列表数据库表';

-- ----------------------------
-- Records of shop_goods_list
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
