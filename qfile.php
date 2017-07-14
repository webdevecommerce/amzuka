<?php

include('settings/db_values.php');

$mysqli = new mysqli($hostName, $userName, $passWord, $dbName);

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* if ($mysqli->query("CREATE TABLE `invitations` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `url` VARCHAR(100) NOT NULL , `bride_name` VARCHAR(100) NOT NULL , `groom_name` VARCHAR(100) NOT NULL , `abount_bride` LONGTEXT NOT NULL , `about_groom` LONGTEXT NOT NULL , `bride_photo` VARCHAR(100) NOT NULL , `groom_photo` VARCHAR(100) NOT NULL , `about_they` LONGTEXT NOT NULL , `created` DATETIME NOT NULL , `contact_person` VARCHAR(100) NOT NULL , `contact_email` VARCHAR(100) NOT NULL , `contact_number` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("INSERT INTO `invitations` (`id`, `url`, `bride_name`, `groom_name`, `abount_bride`, `about_groom`, `bride_photo`, `groom_photo`, `about_they`, `created`, `contact_person`, `contact_email`, `contact_number`) VALUES (NULL, 'vinothkumarwedssowmiya', 'Vinothkumar', 'Sowmiya', '', '', '', '', '', CURRENT_TIME(), 'Jp', 'jayaprakash257@gmail.com', '9025537457');") === TRUE) {
    echo '1<br>';
}

if ($mysqli->query("CREATE TABLE `alert_info` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `event_id` INT(11) NOT NULL , `mobile_number` VARCHAR(100) NOT NULL , `email_address` VARCHAR(100) NOT NULL , `created` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB") === TRUE) {
    echo '1<br>';
}

if ($mysqli->query("CREATE TABLE `rsvp_info` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `event_id` INT(11) NOT NULL , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `message` LONGTEXT NOT NULL , `created` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB") === TRUE) {
    echo '1<br>';
} */
/* 
if ($mysqli->query("ALTER TABLE `invitations` ADD `marriage_date` DATETIME NOT NULL AFTER `contact_number`, ADD `marriage_venue` TEXT NOT NULL AFTER `marriage_date`, ADD `marriage_venue_lat` FLOAT(10,6) NOT NULL AFTER `marriage_venue`, ADD `marriage_venue_lng` FLOAT(10,6) NOT NULL AFTER `marriage_venue_lat`, ADD `status` ENUM('upcoming','completed') NOT NULL DEFAULT 'upcoming' AFTER `marriage_venue_lng`, ADD `payment_status` ENUM('pending','paid') NOT NULL DEFAULT 'pending' AFTER `status`;") === TRUE) {
    echo '1<br>';
} */

/* if ($mysqli->query("ALTER TABLE `invitations` ADD `mode` ENUM('Publish','UnPublish') NOT NULL DEFAULT 'UnPublish' AFTER `payment_status`;") === TRUE) {
    echo '1<br>';
}

if ($mysqli->query("ALTER TABLE `invitations` ADD `galary_images` LONGTEXT NOT NULL AFTER `groom_photo`;") === TRUE) {
    echo '1<br>';
} */

/*
if ($mysqli->query("ALTER TABLE `invitations` ADD `user_id` INT(11) NOT NULL AFTER `mode`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `plan` INT(11) NOT NULL AFTER `user_id`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `plan_amount` DOUBLE(10,2) NOT NULL AFTER `plan`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `coupon_id` INT(11) NOT NULL AFTER `plan_amount`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `coupon_amount` DOUBLE(10,2) NOT NULL AFTER `coupon_id`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `total_amount` DOUBLE(10,2) NOT NULL AFTER `coupon_amount`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `transaction_id` LONGTEXT NOT NULL AFTER `total_amount`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `subscription_date` DATETIME NOT NULL AFTER `transaction_id`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `expiry_date` DATETIME NOT NULL AFTER `subscription_date`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `invitations` ADD `marriage_landmark` VARCHAR(255) NOT NULL AFTER `marriage_venue`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("CREATE TABLE `plans` (`id` int(11) NOT NULL,`plan_name` varchar(100) NOT NULL,`plan_duration` int(11) NOT NULL COMMENT 'in days',`created` datetime NOT NULL,`status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',`plan_title` varchar(200) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `plans` ADD `plan_amount` DOUBLE(10,2) NOT NULL AFTER `plan_duration`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `plans` ADD `plan_duration_type` VARCHAR(20) NOT NULL AFTER `plan_name`;") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `plans` CHANGE `plan_duration_type` `plan_dur_type` ENUM('Day','Month','Year','Lifetime') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;") === TRUE) {
    echo '1<br>';
}*/

/* 
if ($mysqli->query("ALTER TABLE `invitations` ADD `event_type` VARCHAR(255) NOT NULL AFTER `contact_number`;") === TRUE) {
    echo '1<br>';
}
*/

/* if ($mysqli->query("CREATE TABLE `couponcodes` ( `id` INT(11) NULL AUTO_INCREMENT , `coupon_code` VARCHAR(50) NOT NULL , `type` SET('Flat','Percent') NULL DEFAULT NULL , `amount` DOUBLE(10,2) NOT NULL , `max_no_of_usage` INT(11) NOT NULL , `max_no_of_usage_per_user` INT(11) NOT NULL , `no_of_usage` INT(11) NOT NULL , `validity_from_date` DATE NOT NULL , `validity_to_date` DATE NOT NULL , `status` ENUM('Active','Inactive','Expired') NULL DEFAULT NULL  , PRIMARY KEY (`id`)) ENGINE = InnoDB DEFAULT CHARSET=utf8;") === TRUE) {
    echo '1<br>';
}else{
	echo $mysqli->error.'<br>';
}

if ($mysqli->query("ALTER TABLE `couponcodes` ADD `created` DATETIME NOT NULL AFTER `status`;") === TRUE) {
    echo '1<br>';
} */

/* if ($mysqli->query("ALTER TABLE `invitations` ADD `reception_date` DATETIME NOT NULL AFTER `marriage_venue_lat`, ADD `reception_venue` TEXT NOT NULL AFTER `reception_date`, ADD `reception_landmark` VARCHAR(255) NOT NULL AFTER `reception_venue`, ADD `reception_venue_lat` FLOAT(10,6) NOT NULL AFTER `reception_landmark`, ADD `reception_venue_lng` FLOAT(10,6) NOT NULL AFTER `reception_venue_lat`;") === TRUE) {
    echo '1<br>';
} */

/* if ($mysqli->query("ALTER TABLE `invitations` ADD `views_count` INT(11) NOT NULL AFTER `reception_venue_lng`;") === TRUE) {
    echo '1<br>';
}
 */
 
/* 
if ($mysqli->query("CREATE TABLE `users_temp` (
  `id` int(11) NOT NULL,
  `user_type` enum('normal','twitter','facebook','google') NOT NULL DEFAULT 'normal',
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dail_code` varchar(8) NOT NULL DEFAULT '+91',
  `phone_no` varchar(20) NOT NULL,
  `otp_code` varchar(10) NOT NULL,
  `gender` enum('Male','Female','') NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;") === TRUE) {
    echo '1<br>';
}

if ($mysqli->query("ALTER TABLE `users_temp`  ADD PRIMARY KEY (`id`);") === TRUE) {
    echo '1<br>';
}
if ($mysqli->query("ALTER TABLE `users_temp` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;") === TRUE) {
    echo '1<br>';
} */

/* if ($mysqli->query("ALTER TABLE `rsvp_info` ADD `status` ENUM('Publish','UnPublish') NOT NULL DEFAULT 'UnPublish' AFTER `created`;") === TRUE) {
    echo '1<br>';
} */

/* if ($mysqli->query("ALTER TABLE `invitations` ADD `type` ENUM('Live','Demo') NOT NULL DEFAULT 'Live' AFTER `payment_status`;") === TRUE) {
    echo '1<br>';
} */
 
 
?>