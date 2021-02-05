<?php
	include "dbConnection.php";

	//query to get all the students
	$query    = $db->query( "SELECT * FROM `students` ORDER BY student_id DESC" );
	$students = $query->fetchAll( PDO::FETCH_ASSOC );

	foreach ( $students as $student ): ?>
		<tr>
			<td><?= $student['student_id'] ?></td>
			<td><?= $student['student_firstname'] ?></td>
			<td><?= $student['student_lastname'] ?></td>
			<td><?= $student['student_age'] ?></td>
			<td><?= $student['student_gender'] ?></td>
			<td><?= $student['student_location'] ?></td>
			<td><?= $student['student_program'] ?></td>
			<td>
				<?php
					if ( $student['student_status'] == "1" ) {
						echo "<span class='badge badge-success'>Active</span>";
					} else {
						echo "<span class='badge badge-danger'>Inactive</span>";
					}
				?>
			</td>
			<td>
				<a href="#" class="btn btn-primary editBtn" data-toggle="modal" data-target="#editModal"
				   data-id="<?= $student['student_id'] ?>" >Edit</a>

				<?php if ( $student['student_status'] == "1" ): ?>
					<a href="#" data-id="<?= $student['student_id'] ?>" data-action="ban" class="action btn
					btn-warning">Ban</a>
				<?php else: ?>
					<a href="#" data-id="<?= $student['student_id'] ?>" data-action="unban" class="action btn
					btn-secondary">Unban</a>
				<?php endif; ?>
				<a href="#" data-id="<?= $student['student_id'] ?>" data-action="delete" class="action btn btn-danger
				deleteBtn">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>