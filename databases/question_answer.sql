CREATE TABLE IF NOT EXISTS `student_table`(
  `srn` varchar(255) NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `department` int NOT NULL,
  `semester` int NOT NULL,
  `section` varchar(2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `dob` DATE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `professor`(
  `teacher_id` varchar(255) NOT NULL PRIMARY KEY,
  `teacher_name` varchar(255) NOT NULL,
  `department` int NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `teacher_mobno` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `teacher_dob` DATE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `questions`(
  `question_id` bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `question_content` TEXT NOT NULL,
  `question_date` DATETIME NOT NULL,
  `srn` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,name
  `up_vote` int
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `answers`(
  `answer_id` bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `answer_content` TEXT NOT NULL,
  `answer_date` DATETIME NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `question_id` bigint NOT NULL,
  `up_vote` int,
  `down_vote` int
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `votes`(
  `sl_no` bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `srn` varchar(255) NOT NULL,
  `answer_id` bigint NOT NULL,
  `is_upvote` boolean DEFAULT 0,
  `is_downvote` boolean DEFAULT 0
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` varchar(255) NOT NULL PRIMARY KEY,
  `subject_name` varchar(255) NOT NULL,
  `department_id` int NOT NULL,
  `semester` int NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `report` (
  `sl_no` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `question_id` bigint NOT NULL,
  `srn` varchar(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `subscribers`(
  `subscriber_id` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `subscriber_email` varchar(255) NOT NULL
) ENGINE=InnoDB;

ALTER TABLE `questions`
ADD KEY `srn`(`srn`),
ADD KEY `subject_id`(`subject_id`);

ALTER TABLE `answers`
ADD KEY `teacher_id`(`teacher_id`),
ADD KEY `question_id`(`question_id`);

ALTER TABLE `votes`
ADD KEY `srn`(`srn`),
ADD KEY `answer_id`(`answer_id`);

ALTER TABLE `subjects`
ADD KEY `department_id`(`department_id`);

ALTER TABLE `report`
ADD KEY `question_id`(`question_id`),
ADD KEY `srn`(`srn`);

ALTER TABLE `questions`
ADD CONSTRAINT `srn_fk` FOREIGN KEY(`srn`) REFERENCES `student_table`(`srn`),
ADD CONSTRAINT `subject_id_fk` FOREIGN KEY(`subject_id`) REFERENCES `subjects`(`subject_id`);

ALTER TABLE `answers`
ADD CONSTRAINT `teacher_id_fk` FOREIGN KEY(`teacher_id`) REFERENCES `professor`(`teacher_id`),
ADD CONSTRAINT `question_id_fk` FOREIGN KEY(`question_id`) REFERENCES `questions`(`question_id`);

ALTER TABLE `votes`
ADD CONSTRAINT `student_srn_fk` FOREIGN KEY(`srn`) REFERENCES `student_table`(`srn`),
ADD CONSTRAINT `ans_id_fk` FOREIGN KEY(`answer_id`) REFERENCES `answers`(`answer_id`);

ALTER TABLE `subjects`
ADD CONSTRAINT `department_fk` FOREIGN KEY(`department_id`) REFERENCES `department`(`department_id`);

ALTER TABLE `report`
ADD CONSTRAINT `quest_id_fk` FOREIGN KEY(`question_id`) REFERENCES `questions`(`question_id`),
ADD CONSTRAINT `std_srn_fk` FOREIGN KEY(`srn`) REFERENCES `student_table`(`srn`);
