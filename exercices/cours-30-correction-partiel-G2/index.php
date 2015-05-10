<?php

	require 'inc/config.php';
	require 'inc/expenses.class.php';

	$expenses = new Expenses($pdo);

	if(!empty($_POST))
		$expenses->create($_POST);

	if(!empty($_GET['delete_id']))
		$expenses->delete($_GET['delete_id']);

	$all_expenses = $expenses->getAll();
	$total        = $expenses->getTotal();

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


			<div class="col-md-6">
				<form action="#" method="POST">
					<div class="form-group">
						<label for="name">Name</label>
						<input class="form-control" type="text" name="name" id="name">
					</div>
					<div class="form-group">
						<label for="amount">Amount</label>
						<input class="form-control" type="text" name="amount" id="amount">
					</div>
					<div>
						<input class="btn btn-success" type="submit">
					</div>
				</form>
			</div>
			
			<div class="col-md-6">
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
								<td><?= $_expense->amount ?>€</td>
								<td><a class="btn btn-danger" href="?delete_id=<?= $_expense->id ?>">Delete</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				
				Total : <?= $total ?>
			</div>
		</div>
	</div>

</body>
</html>






