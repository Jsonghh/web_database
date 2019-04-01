INSERT INTO USERS (`user_id`, `username`, `firstname`, `lastname`,`password`,`usertype`,`created_date`) VALUES ('1', 'gandalfthegr8', 'gandalf', 'the white',sha1('the ring'),'admin',CURRENT_TIMESTAMP());
INSERT INTO USERS (`user_id`, `username`, `firstname`, `lastname`,`password`,`usertype`,`created_date`) VALUES ('2', 'aragorn', 'strider', 'elfstone',sha1('king'),'standard',CURRENT_TIMESTAMP());
INSERT INTO USERS (`user_id`, `username`, `firstname`, `lastname`,`password`,`usertype`,`created_date`) VALUES ('3', 'legolas', 'legolas', 'elvenking',sha1('arrows'),'standard',CURRENT_TIMESTAMP());
INSERT INTO USERS (`user_id`, `username`, `firstname`, `lastname`,`password`,`usertype`,`created_date`) VALUES ('4', 'frodo', 'frodo', 'baggins',sha1('cloak'),'standard',CURRENT_TIMESTAMP());


INSERT INTO CHEEPS (`cheep_id`, `cheep_text`, `created_date`, `user_id`) VALUES ('1','lets get the ring',CURRENT_TIMESTAMP(),'1');
INSERT INTO CHEEPS (`cheep_id`, `cheep_text`, `created_date`, `user_id`) VALUES ('2','for the fellowship!',CURRENT_TIMESTAMP(),'2');
INSERT INTO CHEEPS (`cheep_id`, `cheep_text`, `created_date`, `user_id`) VALUES ('3','again?',CURRENT_TIMESTAMP(),'4');
INSERT INTO CHEEPS (`cheep_id`, `cheep_text`, `created_date`, `user_id`) VALUES ('4','Ok.',CURRENT_TIMESTAMP(),'3');



INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('2','1',CURRENT_TIMESTAMP());
INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('2','3',CURRENT_TIMESTAMP());
INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('2','4',CURRENT_TIMESTAMP());


INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('3','1',CURRENT_TIMESTAMP());
INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('3','2',CURRENT_TIMESTAMP());
INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('3','4',CURRENT_TIMESTAMP());


INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('4','1',CURRENT_TIMESTAMP());
INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('4','2',CURRENT_TIMESTAMP());
INSERT INTO FOLLOWS (`user_id`, `follows_id`, `created_date`) VALUES ('4','3',CURRENT_TIMESTAMP());



