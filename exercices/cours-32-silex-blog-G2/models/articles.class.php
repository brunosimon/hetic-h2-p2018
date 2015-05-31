<?php

class Articles_Model
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get_all()
    {
		$query = $this->db->query('SELECT * FROM articles');
		$articles = $query->fetchAll();

		return $articles;
    }
}