<?php

class Expenses
{
	public $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function create($data)
	{
		$prepare = $this->pdo->prepare('INSERT INTO expenses (name,amount) VALUES (:name,:amount)');
		$prepare->bindValue(':name',$data['name']);
		$prepare->bindValue(':amount',$data['amount']);
		$prepare->execute();
	}

	public function delete($id)
	{
		$prepare = $this->pdo->prepare('DELETE FROM expenses WHERE id = :id');
		$prepare->bindValue(':id',$id);
		$prepare->execute();
	}

	public function getAll()
	{
		$query = $this->pdo->query('SELECT * FROM expenses');
		$all_expenses = $query->fetchAll();

		return $all_expenses;
	}

	public function getTotal()
	{
		$query = $this->pdo->query('SELECT SUM(amount) as total FROM expenses');
		$total = $query->fetch()->total;

		return $total;
	}
}