CREATE TABLE IF NOT EXISTS `items` (
	`id` int NOT NULL AUTO_INCREMENT, 
	`name` varchar(10),
	`damage` int,

	--Check js for function to check for Unique modifiers

	`Unique_Modifier` varchar(8),

	`health` int,

	`speed` int,
	`attack speed` int,

	PRIMARY KEY (`id`)
);