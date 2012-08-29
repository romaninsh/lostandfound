CREATE  TABLE IF NOT EXISTS `item_flag` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) NOT NULL ,
  `item_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_item_flag_user1` (`user_id` ASC) ,
  INDEX `fk_item_flag_item1` (`item_id` ASC) ,
  CONSTRAINT `fk_item_flag_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `user` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_flag_item1`
    FOREIGN KEY (`item_id` )
    REFERENCES `item` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE  TABLE IF NOT EXISTS `comment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) NOT NULL ,
  `item_id` INT(11) NOT NULL ,
  `comment` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_comment_user1` (`user_id` ASC) ,
  INDEX `fk_comment_item1` (`item_id` ASC) ,
  CONSTRAINT `fk_comment_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `user` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_item1`
    FOREIGN KEY (`item_id` )
    REFERENCES `item` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;