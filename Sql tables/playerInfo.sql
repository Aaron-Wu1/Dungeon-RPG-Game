CREATE TABLE IF NOT EXISTS `towers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enemy_id` int,
  `background` int,
  PRIMARY KEY (`id`)
);

INSERT INTO towers (`enemy_id`, `background`) VALUES


('1','1'),
('1','2');

CREATE TABLE IF NOT EXISTS `players` (
	`id` int NOT NULL AUTO_INCREMENT,

	-- Player Name for score

	`name` varchar(15),

	`password` varchar(225),

	`room_NUM` int,

	`is_HOST` boolean,
	`is_READY` boolean,
	`player_position` int,


	-- Player Avatar

	`player_Avatar_id` int,
	`player_class` int,

	-- Player stats

	`damage` int,
	`health` int,

	-- Tower number

	`tower_NUM` int,

	`current_tower` int,

	-- Skill IDs

	`skill_1` int,
	`skill_2` int,
	`skill_3` int,
	`skill_4` int,
	`skill_1t` int,
	`skill_2t` int,
	`skill_3t` int,
	`skill_4t` int,

	`room_bossHP` int,
 	PRIMARY KEY (`id`)
);
	
-- Player images

CREATE TABLE IF NOT EXISTS `playerAvatars` (
	`id` int NOT NULL AUTO_INCREMENT, 
	`file_name` text,


	PRIMARY KEY (`id`)
);

INSERT INTO playerAvatars (`file_name`) VALUES

-- from Assets folder check index.php for example (under character selection)

('Knight.gif'),
('Rogue.gif'),
('Archer.gif'),
('Mage.gif');



CREATE TABLE IF NOT EXISTS `skills` (
	`id` int NOT NULL AUTO_INCREMENT, 
	`name` varchar(225),
	`file_name` text,
	`damage` int,

-- Possible addition of cast time depending on how we may need to add animation

	PRIMARY KEY (`id`)
);





