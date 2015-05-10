<?php

	require 'inc/config.php';
	require 'inc/expenses.class.php';

	$expenses = new Expenses($pdo);

	// Data sent using POST
	if(!empty($_POST))
		$expenses->create($_POST);

	// Data sent using GET
	if(!empty($_GET['delete_id']))
		$expenses->delete($_GET['delete_id']);

	// Get all expenses
	$all_expenses = $expenses->getAll();

	// Get total
	$total = $expenses->getTotal();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Expenses</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>

	<div class="container">

		<h1>Expenses</h1>

		<div class="row">
			<div class="col-md-4">
				<form action="#" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="amount">Amount</label>
						<input type="text" id="amount" name="amount" class="form-control">
					</div>
					<div>
						<input type="submit" class="btn btn-success">
					</div>
				</form>
			</div>
			
			<div class="col-md-8">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Amount</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($all_expenses as $_expense): ?>
							<tr>
								<td><?= $_expense->name ?></td>
								<td><?= $_expense->amount ?> €</td>
								<td><a class="btn btn-danger btn-sm" href="?delete_id=<?= $_expense->id ?>">Delete</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				total : <?= $total ?>
			</div>
		</div>
	</div>
</body>
</html>