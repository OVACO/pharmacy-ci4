/*
 Navicat Premium Data Transfer

 Source Server         : 001
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : pharmacy

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 18/11/2022 09:12:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for government_setting
-- ----------------------------
DROP TABLE IF EXISTS `government_setting`;
CREATE TABLE `government_setting`  (
  `id` int NOT NULL COMMENT 'ลำดับ',
  `government_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'การเปิดปิด',
  `government_update` datetime NULL DEFAULT NULL COMMENT 'วันเวลาที่บันทึก',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of government_setting
-- ----------------------------
INSERT INTO `government_setting` VALUES (1, 'เปิดให้บริการ วันจันทร์-วันศุกร์ (ยกเว้นวันหยุดที่ทางราชการกำหนด) เวลาทำการ 08:30-16:00 น. (หยุดพักกลางวัน 12.00 – 13.00 น.)', '2022-03-22 15:22:07');

-- ----------------------------
-- Table structure for license_user
-- ----------------------------
DROP TABLE IF EXISTS `license_user`;
CREATE TABLE `license_user`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ',
  `license_code` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสสิทธิ์การเข้าถึง',
  `license_con` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สิทธิ์การเข้าถึง',
  PRIMARY KEY (`id`, `license_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of license_user
-- ----------------------------
INSERT INTO `license_user` VALUES (1, '00040', 'เจ้าหน้าที่');
INSERT INTO `license_user` VALUES (2, '00', 'ผู้ดูแลระบบ');
INSERT INTO `license_user` VALUES (3, '01', 'ประชาชนทั่วไป');
INSERT INTO `license_user` VALUES (4, '02', 'รอการอนุมัติ');

-- ----------------------------
-- Table structure for main_title
-- ----------------------------
DROP TABLE IF EXISTS `main_title`;
CREATE TABLE `main_title`  (
  `main_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสหัวข้อหลัก',
  `title_stid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รหัสสถานะการแสดงผลข้อมูล',
  `content` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อหัวข้อหลัก',
  `user_add` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้บันทึก',
  `date_add` datetime NULL DEFAULT NULL COMMENT 'วันที่บันทึก',
  `user_edit` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้แก้ไข',
  `date_edit` datetime NULL DEFAULT NULL COMMENT 'วันที่แก้ไข',
  PRIMARY KEY (`main_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 99 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of main_title
-- ----------------------------
INSERT INTO `main_title` VALUES (1, '0', 'วัคซีนพาสปอร์ต (COVID-19 Vaccine passport)', 'admin', '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `main_title` VALUES (2, '1', 'ขอรับใบอนุญาติ', 'admin', '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `main_title` VALUES (3, '1', 'ขออนุญาตินำหรือสั่งยาเข้ามาในราชอาณาจักร', 'officer', '2022-07-05 13:14:39', 'officer', '2022-07-05 13:15:36');
INSERT INTO `main_title` VALUES (4, '1', 'ขอต่ออายุ', 'officer', '2022-07-05 13:18:28', NULL, NULL);
INSERT INTO `main_title` VALUES (5, '1', 'หนังสือมอบอำนาจ และแบบฟอร์มอื่นๆ', 'officer', '2022-07-05 13:32:10', NULL, NULL);

-- ----------------------------
-- Table structure for pharmacy
-- ----------------------------
DROP TABLE IF EXISTS `pharmacy`;
CREATE TABLE `pharmacy`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ',
  `id_card` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสบัตรประชาชน',
  `date_app` date NOT NULL COMMENT 'วันที่มาติดต่อ',
  `time_id` int NOT NULL COMMENT 'รหัสเวลาที่มาติดต่อ',
  `main_id` int NOT NULL COMMENT 'รหัสหัวข้อหลัก\r\n',
  `secondary_id` int NOT NULL COMMENT 'รหัสหัวข้อรอง',
  `status_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รหัสสถานะ',
  `user_add` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้บันทึก',
  `date_add` datetime NULL DEFAULT NULL COMMENT 'วันที่บันทึก',
  `user_edit` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้แก้ไข',
  `date_edit` datetime NULL DEFAULT NULL COMMENT 'วันที่แก้ไข',
  `reason` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เหตุผล',
  PRIMARY KEY (`id_card`, `main_id`, `secondary_id`, `date_app`) USING BTREE,
  INDEX `idx`(`id` ASC) USING BTREE,
  INDEX `main_id`(`main_id` ASC) USING BTREE,
  INDEX `secondary_id`(`secondary_id` ASC) USING BTREE,
  INDEX `ti_ph`(`time_id` ASC) USING BTREE,
  INDEX `st_ph`(`main_id` ASC, `secondary_id` ASC) USING BTREE,
  CONSTRAINT `cid` FOREIGN KEY (`id_card`) REFERENCES `register` (`id_card`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `st_ph` FOREIGN KEY (`main_id`, `secondary_id`) REFERENCES `secondary_title` (`main_id`, `secondary_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `ti_ph` FOREIGN KEY (`time_id`) REFERENCES `time` (`time_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 404 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pharmacy
-- ----------------------------
-- ----------------------------
-- Table structure for pharmacy_token
-- ----------------------------
DROP TABLE IF EXISTS `pharmacy_token`;
CREATE TABLE `pharmacy_token`  (
  `id` int NOT NULL COMMENT 'ลำดับ',
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'โทเค็นไลน์',
  `d_update` datetime NULL DEFAULT NULL COMMENT 'วันเวลาที่บันทึก'
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pharmacy_token
-- ----------------------------
INSERT INTO `pharmacy_token` VALUES (1, 'J91M5bYQKMKs1TXmWAUV2A3OmYZ8qsChvMfW6S5UotW', '2022-03-22 11:50:27');

-- ----------------------------
-- Table structure for register
-- ----------------------------
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ',
  `license_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รหัสสิทธิ์ผู้ใช้',
  `id_card` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสบัตรประชาชน',
  `pname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'คำนำหน้าชื่อ',
  `fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'นามสกุล',
  `phonenumber` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เบอร์โทร',
  `house_num` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'บ้านเลขที่',
  `district` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ตำบล',
  `amphure` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'อำเภอ',
  `province` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'จังหวัด',
  `zip_code` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รหัสไปรษณีย์',
  `user_add` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้บันทึก',
  `date_add` datetime NULL DEFAULT NULL COMMENT 'วันที่บันทึก',
  `user_edit` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้แก้ไข',
  `date_edit` datetime NULL DEFAULT NULL COMMENT 'วันที่แก้ไข',
  PRIMARY KEY (`id_card`) USING BTREE,
  INDEX `idx`(`id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of register
-- ----------------------------
INSERT INTO `register` VALUES (112, '01', '1111111111111', 'นาย', 'ธนพน', 'ลือวัฒนานนนท์', '0951111111', '222', 'ทุ่งน้าว', 'สอง', 'แพร่', '54120', '1111111111111', '2022-07-07 14:44:09', '1111111111111', '2022-07-07 14:48:29');
INSERT INTO `register` VALUES (3, '01', '1540600000001', 'นาย', 'สมจิต', 'ดวงดี', '0911111111', NULL, NULL, NULL, NULL, NULL, '1540600000', '2022-06-14 12:19:42', NULL, NULL);
INSERT INTO `register` VALUES (4, '01', '1540600000002', 'นาง', 'สายใจ', 'เกาะมหาสนุก', '0900000002', NULL, NULL, NULL, NULL, NULL, '1540600000002', '2022-06-14 12:19:42', NULL, NULL);
INSERT INTO `register` VALUES (5, '01', '1540600000003', ' พลเอก', 'บุญพอ', 'มีเท', '0900000003', NULL, NULL, NULL, NULL, NULL, '1540600000003', '2022-06-20 12:12:14', '1540600000003', '2022-06-20 12:13:13');
INSERT INTO `register` VALUES (6, '01', '1540600000004', 'พล.อ.', 'การุณ3', 'เก่งระดมยิง', '0900000004', '12', '12', '12', '12', '12', '1540600000004', '2022-06-21 12:10:17', '1540600000004', '2022-07-05 16:16:17');
INSERT INTO `register` VALUES (7, '02', '1540600000005', 'นาย', 'มนศักดิ์', 'กางมุ้งคอย', '0900000005', NULL, NULL, NULL, NULL, NULL, '1540600000005', '2022-06-25 16:26:56', NULL, '2022-07-05 13:51:55');
INSERT INTO `register` VALUES (8, '02', '1540600000006', 'นางสาว', 'ชะรอยจุติมา', 'ไชโย', '0900000006', NULL, NULL, NULL, NULL, NULL, '1540600000006', '2022-06-25 16:27:37', NULL, NULL);
INSERT INTO `register` VALUES (9, '02', '1540600000007', 'นาย', 'เขมินทร์', 'เธียรนิติฐาดล', '0900000007', NULL, NULL, NULL, NULL, NULL, '1540600000007', '2022-06-25 16:29:10', NULL, NULL);
INSERT INTO `register` VALUES (10, '01', '1540600000008', 'นาง', 'เจตปรียา', 'ธนจิรกานต์', '0900000008', NULL, NULL, NULL, NULL, NULL, '1540600000008', '2022-06-25 16:30:07', NULL, NULL);
INSERT INTO `register` VALUES (11, '01', '1540600000009', 'ผู้ช่วยศาสตราจารย์', 'ฉันชนก', 'กิตติธนปกรณ์', '0900000009', NULL, NULL, NULL, NULL, NULL, '1540600000009', '2022-06-25 16:31:39', NULL, NULL);
INSERT INTO `register` VALUES (12, '01', '1540600000010', 'ศาสตราจารย์	', 'ฐีรวัฒน์', 'ปุญญอภิวัฒนา', '0900000010', NULL, NULL, NULL, NULL, NULL, '1540600000010', '2022-06-25 16:32:39', NULL, NULL);
INSERT INTO `register` VALUES (13, '01', '1540600000011', 'พลตำรวจเอก', 'ดรัณภพ', 'เอกธนนรากุล	', '0900000011', NULL, NULL, NULL, NULL, NULL, '1540600000011', '2022-06-25 16:33:43', NULL, NULL);
INSERT INTO `register` VALUES (14, '01', '1540600102738', 'นาย', 'ธนพนธ์', 'ลือวัฒนานนท์', '0956763161', '234/2', 'ทุ่งน้าว', 'สอง', 'แพร่', '54120', '1540600102738', '2022-06-29 14:55:48', '1540600102738', '2022-07-01 22:03:14');
INSERT INTO `register` VALUES (1, '00', 'admin', '.', '.', '.', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `register` VALUES (2, '00040', 'officer', '.', '.', '.', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2022-03-25 13:51:50');

-- ----------------------------
-- Table structure for secondary_title
-- ----------------------------
DROP TABLE IF EXISTS `secondary_title`;
CREATE TABLE `secondary_title`  (
  `main_id` int NOT NULL COMMENT 'รหัสหัวข้อหลัก',
  `secondary_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสหัวข้อรอง',
  `title_stid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รหัสสถานะการแสดงผลข้อมูล',
  `content2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อหัวข้อรอง',
  `user_add` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้บันทึก\r\n',
  `date_add` datetime NULL DEFAULT NULL COMMENT 'วันที่บันทึก\r\n',
  `user_edit` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้แก้ไข\r\n',
  `date_edit` datetime NULL DEFAULT NULL COMMENT '\r\nวันที่แก้ไข',
  PRIMARY KEY (`secondary_id`, `main_id`) USING BTREE,
  INDEX `main_id`(`main_id` ASC, `secondary_id` ASC) USING BTREE,
  CONSTRAINT `mt_st` FOREIGN KEY (`main_id`) REFERENCES `main_title` (`main_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of secondary_title
-- ----------------------------
INSERT INTO `secondary_title` VALUES (2, 1, '1', 'ขายยาแผนปัจจุบัน', 'officer', '2022-07-05 12:37:15', NULL, NULL);
INSERT INTO `secondary_title` VALUES (2, 2, '1', 'ขายยาแผนปัจจุบันเฉพาะยาบรรจุเสร็จสำหรับสัตว์', 'officer', '2022-07-05 13:10:43', NULL, NULL);
INSERT INTO `secondary_title` VALUES (3, 3, '1', 'ยาแผนโบราณ', 'officer', '2022-07-05 13:15:45', NULL, NULL);
INSERT INTO `secondary_title` VALUES (4, 4, '1', 'ขายยาแผนปัจจุบัน', 'officer', '2022-07-05 13:19:49', NULL, NULL);
INSERT INTO `secondary_title` VALUES (4, 5, '1', 'ขายสั่งยาแผนปัจจุบัน', 'officer', '2022-07-05 13:20:28', NULL, NULL);
INSERT INTO `secondary_title` VALUES (4, 6, '1', 'ขายยาแผนปัจจุบันเฉพาะยาบรรจุเสร็จที่ไม่ใช่ ยาอันตรายหรือยาควบคุมพิเศษ', 'officer', '2022-07-05 13:21:42', NULL, NULL);
INSERT INTO `secondary_title` VALUES (4, 7, '1', 'ขายยาโบราณ', 'officer', '2022-07-05 13:22:25', NULL, NULL);
INSERT INTO `secondary_title` VALUES (5, 8, '1', 'หนังสือมอบอำนาจให้ทำการแทน', 'officer', '2022-07-05 13:32:58', NULL, NULL);
INSERT INTO `secondary_title` VALUES (5, 9, '1', 'หนังสือมอบอำนาจและแต่งตั้งผู้ดำเนินกิจการ', 'officer', '2022-07-05 13:34:47', NULL, NULL);
INSERT INTO `secondary_title` VALUES (5, 10, '0', 'ขอพิจารณาแบบแปลนสถานที่ผลิตยา', 'officer', '2022-07-05 13:37:07', NULL, NULL);

-- ----------------------------
-- Table structure for status_all
-- ----------------------------
DROP TABLE IF EXISTS `status_all`;
CREATE TABLE `status_all`  (
  `status_id` int NOT NULL COMMENT 'รหัสสถานะ',
  `status_con` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`status_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status_all
-- ----------------------------
INSERT INTO `status_all` VALUES (1, 'ยืนยันแล้ว');
INSERT INTO `status_all` VALUES (2, 'รอการยืนยัน');
INSERT INTO `status_all` VALUES (3, 'ปฏิเสธรับเรื่อง');

-- ----------------------------
-- Table structure for subheading
-- ----------------------------
DROP TABLE IF EXISTS `subheading`;
CREATE TABLE `subheading`  (
  `main_id` int NOT NULL COMMENT 'รหัสหัวข้อหลัก',
  `secondary_id` int NOT NULL COMMENT 'รหัสหัวข้อรอง',
  `sub_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสหัวข้อย่อย\r\n',
  `title_stid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รหัสสถานะการแสดงผลข้อมูล',
  `content3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อหัวข้อย่อย',
  `file_dow` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ไฟล์ที่ต้องดาวน์โหลด',
  `file_ex` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ไฟล์ตัวอย่าง',
  `user_add` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้บันทึก\r\n\r\n',
  `date_add` datetime NULL DEFAULT NULL COMMENT 'วันที่บันทึก\r\n',
  `user_edit` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้แก้ไข\r\n\r\n\r\n',
  `date_edit` datetime NULL DEFAULT NULL COMMENT 'วันที่แก้ไข\r\n',
  PRIMARY KEY (`sub_id`, `secondary_id`, `main_id`) USING BTREE,
  INDEX `main_id`(`main_id` ASC, `secondary_id` ASC, `sub_id` ASC) USING BTREE,
  CONSTRAINT `mt_st_sb` FOREIGN KEY (`main_id`, `secondary_id`) REFERENCES `secondary_title` (`main_id`, `secondary_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subheading
-- ----------------------------
INSERT INTO `subheading` VALUES (2, 1, 1, '1', 'เอกสารยื่นพร้อมคําขออนุญาตเปิดร้านขายยา', '20220705123951.pdf', 'null', 'officer', '2022-07-05 12:39:51', NULL, NULL);
INSERT INTO `subheading` VALUES (2, 1, 2, '1', 'สําเนาบัตรประชาชน', '20220705124105.jpg', '20220705124105.jpg', 'officer', '2022-07-05 12:41:05', NULL, NULL);
INSERT INTO `subheading` VALUES (2, 2, 3, '1', 'เอกสารขายยาแผนปัจจุบันเฉพาะยาบรรจุเสร็จสำหรับสัตว์', '20220705131224.pdf', 'null', 'officer', '2022-07-05 13:12:24', NULL, NULL);
INSERT INTO `subheading` VALUES (3, 3, 4, '1', 'เอกสารยาแผนโบราณ', '20220705131711.pdf', 'null', 'officer', '2022-07-05 13:17:11', NULL, NULL);
INSERT INTO `subheading` VALUES (4, 4, 5, '1', 'เอกสารขายยาแผนปัจจุบัน', '20220705132546.pdf', '20220705132547.pdf', 'officer', '2022-07-05 13:25:46', NULL, NULL);
INSERT INTO `subheading` VALUES (4, 7, 6, '1', 'เอกสารต่ออายุขายยาโบราณ', '20220705132707.pdf', 'null', 'officer', '2022-07-05 13:27:07', NULL, NULL);
INSERT INTO `subheading` VALUES (4, 5, 7, '1', 'เอกสารต่ออายุขายสั่งยาแผนปัจจุบัน', '20220705132954.pdf', 'null', 'officer', '2022-07-05 13:29:54', NULL, NULL);
INSERT INTO `subheading` VALUES (4, 6, 8, '1', 'เอกสารต่ออายุขายยาแผนปัจจุบันเฉพาะยาบรรจุเสร็จที่ไม่ใช่ ยาอันตรายหรือควบคุม', '20220705133051.pdf', 'null', 'officer', '2022-07-05 13:30:51', NULL, NULL);
INSERT INTO `subheading` VALUES (5, 8, 9, '0', 'หนังสือมอบอำนาจให้ทำการแทน', '20220705133332.pdf', 'null', 'officer', '2022-07-05 13:33:32', NULL, NULL);
INSERT INTO `subheading` VALUES (5, 9, 10, '1', 'เอกสารหนังสือมอบอำนาจและแต่งตั้งผู้ดำเนินกิจการ', '20220705133512.pdf', 'null', 'officer', '2022-07-05 13:35:12', NULL, NULL);
INSERT INTO `subheading` VALUES (5, 10, 11, '1', 'แบบคำขอพิจารณาแบบแปลนสถานที่ผลิตยา', '20220705133734.pdf', 'null', 'officer', '2022-07-05 13:37:34', NULL, NULL);

-- ----------------------------
-- Table structure for tim_st
-- ----------------------------
DROP TABLE IF EXISTS `tim_st`;
CREATE TABLE `tim_st`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ',
  `tim_stid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสสถานะเวลา',
  `status_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะเวลา',
  PRIMARY KEY (`id`, `tim_stid`) USING BTREE,
  INDEX `tim_stid`(`tim_stid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tim_st
-- ----------------------------
INSERT INTO `tim_st` VALUES (1, '0', 'ไม่แสดง');
INSERT INTO `tim_st` VALUES (2, '1', 'แสดง');

-- ----------------------------
-- Table structure for time
-- ----------------------------
DROP TABLE IF EXISTS `time`;
CREATE TABLE `time`  (
  `time_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสเวลาที่มาติดต่อ',
  `time_set` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เวลา',
  `tim_stid` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะของเวลาเพื่อกำหนดว่าจะให้แสดงหรือไม่ ให้เป็น0 ไม่แสดง 1 แสดง',
  PRIMARY KEY (`time_id`) USING BTREE,
  INDEX `st_tim`(`tim_stid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of time
-- ----------------------------
INSERT INTO `time` VALUES (1, '07.30 - 08.30 น.', '0');
INSERT INTO `time` VALUES (2, '08.30 - 09.30 น.', '1');
INSERT INTO `time` VALUES (3, '09.30 - 10.30 น.', '1');
INSERT INTO `time` VALUES (4, '10.30 - 11.30 น.', '0');
INSERT INTO `time` VALUES (5, '13.30 - 14.30 น.', '1');
INSERT INTO `time` VALUES (6, '14.30 - 15.30 น.', '1');
INSERT INTO `time` VALUES (7, '15.30 - 16.30 น.', '1');

-- ----------------------------
-- Table structure for title_st
-- ----------------------------
DROP TABLE IF EXISTS `title_st`;
CREATE TABLE `title_st`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ',
  `title_stid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รหัสสถานะการแสดงผลข้อมูล',
  `status_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะการแสดงผลข้อมูล',
  PRIMARY KEY (`id`, `title_stid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of title_st
-- ----------------------------
INSERT INTO `title_st` VALUES (1, '0', 'ไม่แสดง');
INSERT INTO `title_st` VALUES (2, '1', 'แสดง');

SET FOREIGN_KEY_CHECKS = 1;
