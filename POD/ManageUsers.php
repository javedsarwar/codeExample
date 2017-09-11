<?php

	include_once 'database.php';
	
	class ManageUsers{
		public $link;
		
		function __construct()
		{
			$db_connection	=	new dbConnection();
			$this->link	=	$db_connection->connect();
			return $this->link;
		}
		
		function registrationUsers($username, $password, $ip_address, $date, $time)
		{
			$statement	=	"INSERT INTO users (username, password, ip_address, reg_date, reg_time)
								VALUES (?,?,?,?,?)";
			$query		=	$this->link->prepare($statement);
			$values		=	array($username, $password, $ip_address, $date, $time);
			$query->execute($values);
			$counts		=	$query->rowCount();
			return $counts;	
		}
	}
	
	$users	=	new ManageUsers();
	echo $users->registrationUsers('chand', 'pass', '172.0.0.1', '13:00', '12-09-2017');