<?php

class Articles_Model
{
	public $db;
	public $results_per_page = 3;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getOne($id)
	{

	}

	public function getAll($page)
	{

	}

	public function getAllByCategory($id)
	{

	}

	public function getAllCategories()
	{
		$query = $this->db->query('SELECT c.*,COUNT(*) as total FROM categories as c LEFT JOIN articles as a ON c.id = a.id_category GROUP BY c.id');
		$categories = $query->fetchAll();

		return $categories;
	}
}