<?php
	session_start();
	include "dbConnection.php";

	$resultData = [
		"msg"     => "",
		"success" => false,
		"error"   => false
	];

	$resultData['post'] = $_POST;

	if ( isset( $_POST['action'] ) && $_POST['action'] == "addStudent" ) {
		unset( $_POST['action'] ); //remove unused mysql index from post

		//query to add into database
		$query = $db->prepare( "INSERT INTO `students` (`student_firstname`, `student_lastname`, `student_age`, `student_gender`, `student_location`, `student_program`) VALUES (:firstname, :lastname, :age, :gender, :location, :program);" );

		if ( $query->execute( $_POST ) ) {
			//success message
			$resultData['msg']     = $_POST['firstname'] . " " . $_POST['lastname'] . " has been added successfully";
			$resultData['success'] = true;
		} else {
			$resultData['msg']   = "Database Error!";
			$resultData['error'] = true;
		}

	} else if ( isset( $_POST['action'] ) && $_POST['action'] == "ban" ) {

		//query to update database
		$query = $db->prepare( "UPDATE `students` SET `student_status` = 0 WHERE `student_id` = ?;" );

		if ( $query->execute( array( $_POST['id'] ) ) ) {
			//success message
			$resultData['msg']     = "Student #" . $_POST['id'] . " has been banned successfully";
			$resultData['success'] = true;
		} else {
			$resultData['msg']   = "Database Error!";
			$resultData['error'] = true;
		}
	} else if ( isset( $_POST['action'] ) && $_POST['action'] == "unban" ) {

		//query to update database
		$query = $db->prepare( "UPDATE `students` SET `student_status` = 1 WHERE `student_id` = ?;" );

		if ( $query->execute( array( $_POST['id'] ) ) ) {
			//success message
			$resultData['msg']     = "Student #" . $_POST['id'] . " has been unbanned successfully";
			$resultData['success'] = true;
		} else {
			$resultData['msg']   = "Database Error!";
			$resultData['error'] = true;
		}
	} else if ( isset( $_POST['action'] ) && $_POST['action'] == "delete" ) {

		//query to update database
		$query = $db->prepare( "DELETE FROM `students` WHERE `student_id` = ?;" );

		if ( $query->execute( array( $_POST['id'] ) ) ) {
			//success message
			$resultData['msg']     = "Student #" . $_POST['id'] . " has been deleted successfully";
			$resultData['success'] = true;
		} else {
			$resultData['msg']   = "Database Error!";
			$resultData['error'] = true;
		}
	} else if ( isset( $_POST['action'] ) && $_POST['action'] == 'editStudent' ) {

		//query to update database's record
		$query = $db->prepare( "UPDATE `students` SET `student_firstname`= :firstname, `student_lastname`= :lastname, `student_age`= :age, `student_gender`= :gender, `student_location`= :location, `student_program` = :program, `student_status` = :status WHERE `student_id` = :id;" );
		$res   = $query->execute( array(
			'firstname' => $_POST['firstname'],
			'lastname'  => $_POST['lastname'],
			'age'       => $_POST['age'],
			'gender'    => $_POST['gender'],
			'location'  => $_POST['location'],
			'program'   => $_POST['program'],
			'status'    => $_POST['status'],
			'id'        => $_POST['id'],
		) );


		if ( $res ) {
			//success message
			$resultData['msg']     = $_POST['firstname'] . " " . $_POST['lastname'] . " has been edited successfully";
			$resultData['success'] = true;
		} else {
			$resultData['msg']   = "Database Error!";
			$resultData['error'] = true;
		}
	} else if ( isset( $_GET['action'] ) && $_GET['action'] == 'singleStudent' ) {
		$query         = $db->query( "SELECT * FROM `students` WHERE `student_id` = " . $_GET['id'] );
		$singleStudent = $query->fetch( PDO::FETCH_ASSOC );

		if ( $singleStudent ) {
			//success message
			$resultData['student']    = $singleStudent;
			$resultData['success'] = true;
		} else {
			$resultData['msg']   = "Unknown Student ... DB Error";
			$resultData['error'] = true;
		}
	}

	exit( json_encode( $resultData ) );