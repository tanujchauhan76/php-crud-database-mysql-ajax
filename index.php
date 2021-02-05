<!DOCTYPE html>
<html lang="en">

<head>
	<title>Code with Tanuj- 2020</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
	      id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<style type="text/css">
		body {
			background-color: #eee;
		}

		.container-fluid {
			padding: 50px;
		}

		.container {
			background-color: white;
			padding: 50px;
		}

		#title {
			font-family: 'Lobster', cursive;
		}
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="alert alert-success alert-dismissible" style="display: none;">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Success!</strong> <span class="message"></span>
				</div>

				<h2 class="text-center float-left" id="title">Mushu's Class</h2>
				<a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#addModal">Add
					Student</a>

				<a href="#" class="btn btn-success float-right textBtn d-none">Test</a>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>ID</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Age</th>
						<th>Gender</th>
						<th>Location</th>
						<th>Program</th>
						<th>Status</th>
						<th class="text-center">Action</th>
					</tr>
					</thead>
					<tbody id="tableData">
					<?php include "tbody.php" ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div class="modal" id="addModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Add New Student</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form id="addStudent">
						<input type="hidden" name="action" value="addStudent">
						<div class="form-group">
							<label for="fname">Firstname:</label>
							<input type="text" name="firstname" class="form-control" placeholder="Enter firstname"
							       id="fname">
						</div>

						<div class="form-group">
							<label for="lname">Lastname:</label>
							<input type="text" name="lastname" class="form-control" placeholder="Enter lastname"
							       id="lname">
						</div>

						<div class="form-group">
							<label for="age">Age:</label>
							<input type="number" name="age" class="form-control" placeholder="Enter age" id="age">
						</div>

						<div class="form-group">
							<label for="gender">Gender:</label>
							<select name="gender" id="gender" class="form-control">
								<option value="">Select Gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</div>
						<div class="form-group">
							<label for="location">Location:</label>
							<input type="text" name="location" class="form-control" placeholder="Enter location"
							       id="location">
						</div>
						<div class="form-group">
							<label for="program">Program:</label>
							<select name="program" id="program" class="form-control">
								<option value="">Select Program</option>
								<option>Programming</option>
								<option>Accounting</option>
								<option>ECE</option>
								<option>Networking</option>
								<option>ATP</option>
								<option>Interior Design</option>
								<option>Business</option>
								<option>CAD</option>
								<option>IT Support</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="addStudent" value="Add Student"
							       class="form-control btn btn-success">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div class="modal" id="editModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Edit Student</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form id="editStudent">
						<input type="hidden" name="action" value="editStudent">
						<input type="hidden" name="id">
						<div class="form-group">
							<label for="fname">Firstname:</label>
							<input type="text" name="firstname" class="form-control" placeholder="Enter firstname"
							       id="fname">
						</div>

						<div class="form-group">
							<label for="lname">Lastname:</label>
							<input type="text" name="lastname" class="form-control" placeholder="Enter lastname"
							       id="lname">
						</div>

						<div class="form-group">
							<label for="age">Age:</label>
							<input type="number" name="age" class="form-control" placeholder="Enter age" id="age">
						</div>

						<div class="form-group">
							<label for="gender">Gender:</label>
							<select name="gender" id="gender" class="form-control">
								<option value="">Select Gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</div>
						<div class="form-group">
							<label for="location">Location:</label>
							<input type="text" name="location" class="form-control" placeholder="Enter location"
							       id="location">
						</div>
						<div class="form-group">
							<label for="program">Program:</label>
							<select name="program" id="program" class="form-control">
								<option value="">Select Program</option>
								<option>Programming</option>
								<option>Accounting</option>
								<option>ECE</option>
								<option>Networking</option>
								<option>ATP</option>
								<option>Interior Design</option>
								<option>Business</option>
								<option>CAD</option>
								<option>IT Support</option>
							</select>
						</div>
						<div class="form-group">
							<label for="status">Status:</label>
							<select name="status" id="status" class="form-control">
								<option value="">Select Status</option>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="editStudent" value="Edit Student"
							       class="form-control btn btn-success">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(function () {

			$("#addStudent").submit(function () {
				$.post("core.php", $(this).serialize(), function (data) {
					data = $.parseJSON(data);

					if (data.success == true) {
						$('#addModal').modal('toggle'); //close modal
						$("#addStudent").trigger("reset"); //reset form
						$(".alert-success .message").html(data.msg); //add success message
						$(".alert-success").show(); //show alert
						$("#tableData").load("tbody.php")//reload table
					}
				});

				return false;
			});

			$('#editModal').on('shown.bs.modal', function (e) {
				let modal = $(this);
				$.get("core.php", {action: "singleStudent", id: $(e.relatedTarget).data("id")}, function (data) {
					data = $.parseJSON(data);

					if (data.success == true) {
						modal.find("[name='id']").val(data.student.student_id);
						modal.find("[name='firstname']").val(data.student.student_firstname);
						modal.find("[name='lastname']").val(data.student.student_lastname);
						modal.find("[name='age']").val(data.student.student_age);
						modal.find("[name='gender']").val(data.student.student_gender);
						modal.find("[name='location']").val(data.student.student_location);
						modal.find("[name='program']").val(data.student.student_program);
						modal.find("[name='status']").val(data.student.student_status);
					}
				});
			});


			$("#editStudent").submit(function () {
				$.post("core.php", $(this).serialize(), function (data) {
					data = $.parseJSON(data);

					if (data.success == true) {
						$('#editModal').modal('toggle'); //close modal
						$("#editStudent").trigger("reset"); //reset form
						$(".alert-success .message").html(data.msg); //add success message
						$(".alert-success").show(); //show alert
						$("#tableData").load("tbody.php")//reload table
					} else {
						console.log(data);
					}
				});

				return false;
			});


			$("body").on("click", ".action", function (e) {
				let confirmed = true;

				if ($(this).data("action") == "delete") {
					confirmed = confirm('Are you sure you want to delete this student?\nThis action cannot be undone!')
				}

				if (confirmed) {
					$.post("core.php", {action: $(this).data("action"), id: $(this).data("id")}, function (data) {
						data = $.parseJSON(data);

						if (data.success == true) {
							$(".alert-success .message").html(data.msg); //add success message
							$(".alert-success").show(); //show alert
							$("#tableData").load("tbody.php")//reload table
						}
					});
				}
			});
		})
	</script>

	<p class="text-center">
		<small id="passwordHelpInline" class="text-muted"> Tanuj Chauhan : <a href="https://www.github.com/tanujchauhan76/"
		                                                                         target="_blank">Code with Tanuj </a>
	</p>
</div>
</body>


</html>