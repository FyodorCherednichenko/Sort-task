SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sort
-- ----------------------------
DROP TABLE IF EXISTS `sort`;
CREATE TABLE `sort`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `SORT` int NULL DEFAULT NULL,
  `NAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sort
-- ----------------------------
INSERT INTO `sort` VALUES (1, 1, 'Первый');
INSERT INTO `sort` VALUES (2, 2, 'Второй');
INSERT INTO `sort` VALUES (3, 3, 'Третий');
INSERT INTO `sort` VALUES (4, 4, 'Четвёртый');
INSERT INTO `sort` VALUES (52, 5, 'Пятый');
INSERT INTO `sort` VALUES (64, 6, 'Шестой');
INSERT INTO `sort` VALUES (71, 7, 'Седьмой');
INSERT INTO `sort` VALUES (72, 8, 'Восьмой');
INSERT INTO `sort` VALUES (80, 9, 'Девятый');
INSERT INTO `sort` VALUES (89, 10, 'Десятый');

SET FOREIGN_KEY_CHECKS = 1;
