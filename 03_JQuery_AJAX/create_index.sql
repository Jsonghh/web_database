ALTER TABLE `p4records`
	ADD FULLTEXT INDEX `full_text_index` (`title`, `description`, `keywords`);
