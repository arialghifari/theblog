<?php

include "../../connection.php";
session_start();

if (!isset($_SESSION['user_id'])) {
	return Header('Location: ../../');
}

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	if (empty($name)) {
		$errorMessage = "Please fill out this field";

		return header("Location: ./add_form.php?err=$errorMessage");
	}

	$sql = "UPDATE category SET name='$name' WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		header("Location: ./");
	} else {
		echo "Error: " . $sql . "<br/>" . mysqli_error($conn);
	}
} else {
	header("Location: ./");
}
