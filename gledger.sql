/*
 Navicat Premium Data Transfer

 Source Server         : xampp-local-mariadb
 Source Server Type    : MariaDB
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : gledger

 Target Server Type    : MariaDB
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 28/05/2020 21:08:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for ledger
-- ----------------------------
DROP TABLE IF EXISTS `ledger`;
CREATE TABLE `ledger`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sec_of_use` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cost_amt` int(11) NOT NULL,
  `spend_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `yyyymm` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ledger
-- ----------------------------
INSERT INTO `ledger` VALUES (1, 'Grocery', 1000, 'arman', '2020-04-21', 202004);
INSERT INTO `ledger` VALUES (2, 'Grocery', 500, 'sumon', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (3, 'Fruit', 200, 'sumon', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (4, 'Grocery', 12, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (5, 'Grocery', 123, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (6, 'Grocery', 123, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (7, 'Grocery', 123, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (10, 'Water', 15, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (11, 'Grocery', 34, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (12, 'Grocery', 45, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (13, 'Coffee', 390, 'arman', '2020-04-01', 202004);
INSERT INTO `ledger` VALUES (14, 'Grocery', 1200, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (15, 'Grocery', 1235, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (16, 'Grocery', 123, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (17, 'Grocery', 789, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (18, 'Grocery', 2637, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (19, 'Oil', 210, 'arman', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (20, 'Rise', 250, 'sumon', '2020-04-21', 202004);
INSERT INTO `ledger` VALUES (21, 'Meat', 550, 'sumon', '2020-04-16', 202004);
INSERT INTO `ledger` VALUES (22, 'Daily Goods', 560, 'sumon', '2020-04-21', 202004);
INSERT INTO `ledger` VALUES (23, 'Daily Goods', 450, 'sumon', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (24, 'Grocery', 230, 'sumon', '2020-04-09', 202004);
INSERT INTO `ledger` VALUES (25, 'Something', 100, 'sumon', '2020-04-10', 202004);
INSERT INTO `ledger` VALUES (26, 'Bics', 230, 'sumon', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (30, 'Grocery', 64, 'sumon', '2020-04-09', 202004);
INSERT INTO `ledger` VALUES (32, 'Gas', 350, 'sumon', '2020-04-17', 202004);
INSERT INTO `ledger` VALUES (33, 'Grocery', 120, 'sumon', '2020-04-11', 202004);
INSERT INTO `ledger` VALUES (34, 'Grocery', 350, 'sumon', '2020-04-22', 202004);
INSERT INTO `ledger` VALUES (35, 'Shopping', 1000, 'arman', '2020-04-23', 202004);
INSERT INTO `ledger` VALUES (36, 'Grocery', 56, 'arman', '2020-04-15', 202004);
INSERT INTO `ledger` VALUES (38, 'Grocery', 678, 'arman', '2020-04-23', 202004);
INSERT INTO `ledger` VALUES (39, 'Grocery', 564, 'arman', '2020-04-15', 202004);
INSERT INTO `ledger` VALUES (40, 'Grocery', 54, 'arman', '2020-04-07', 202004);
INSERT INTO `ledger` VALUES (41, 'Grocery', 564, 'arman', '2020-04-15', 202004);
INSERT INTO `ledger` VALUES (42, 'Grocery', 456, 'arman', '2020-04-15', 202004);
INSERT INTO `ledger` VALUES (43, 'Grocery', 67, 'arman', '2020-04-15', 202004);
INSERT INTO `ledger` VALUES (44, 'Grocery', 90, 'arman', '2020-04-06', 202004);
INSERT INTO `ledger` VALUES (45, 'Ramadan', 789, 'sumon', '2020-04-23', 202004);
INSERT INTO `ledger` VALUES (46, 'Grocery', 100, 'arman', '2020-04-08', 202004);
INSERT INTO `ledger` VALUES (47, 'Grocery', 35, 'arman', '2020-04-10', 202004);
INSERT INTO `ledger` VALUES (48, 'Grocery', 76, 'arman', '2020-04-21', 202004);
INSERT INTO `ledger` VALUES (49, 'Grocery', 78, 'arman', '2020-04-20', 202004);
INSERT INTO `ledger` VALUES (50, 'Rice', 485, 'arman', '2020-04-30', 202004);

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'user',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES (1, 'arman', 'Arman Arif', '1', '202cb962ac59075b964b07152d234b70', 'user');
INSERT INTO `members` VALUES (2, 'sumon', 'Dawdujjaman Sumon', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'user');

SET FOREIGN_KEY_CHECKS = 1;
