CREATE TABLE IF NOT EXISTS `enemy` (
	`id` int NOT NULL AUTO_INCREMENT,

	-- ENEMY Name for score

	`name` varchar(20),

	-- ENEMY stats

	`health` int,
	`file_name` text,


	-- Tower number

	`tower_NUM` int,

	-- Skill IDs (may want to add more)

	`skill_1` int,
	`skill_2` int,
	`skill_3` int,
	`skill_4` int,
 	PRIMARY KEY (`id`)
);

INSERT INTO enemy (`name`, `health`, `file_name`, `tower_NUM`, `skill_1`, `skill_2`,`skill_3`, `skill_4`) VALUES

-- from Assets folder check index.php for example (under character selection)

('Underlord','100','boss.jpg', '1', '1','10','17','25'),
('Nightmare','1000','boss2.gif', '2', '3','13','19','27'),
('World END','10000','boss3.gif', '3', '5','14','22','29'),
('Ghost','100000','boss4.gif', '4', '7','15','23','31'),
('King of Night','1000000','boss5.gif', '6', '8','16','24','32');


