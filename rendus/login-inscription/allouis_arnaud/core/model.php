<?php

class Model {

	public function __construct () {

		try {
		    $this->db = new PDO('mysql:host=localhost;dbname=exercice-login-allouis_arnaud', 'root', 'root');
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		$this->table = strtolower(str_replace('Model', '', get_class($this)));
	}

	/**
	 * [readAll row of the table class]
	 * @return [object] [all data]
	 */
	public function readAll () {

		$sql = 'SELECT * FROM '.$this->table;

		$exec = $this->db->prepare($sql);

		$exec->execute();

		$data = $exec->fetchAll(PDO::FETCH_OBJ); 

		if (!$data) {
			return json(404,'No data in '.$this->table);
		} else {
			return json(200, $data);
		}
	}

	/**
	 * [readOne Read one row of table]
	 * @param  [type] $column [description]
	 * @param  [type] $value  [description]
	 * @return [type]         [description]
	 */
	public function readOne ($column, $value) {

		$sql = 'SELECT * FROM '.$this->table.' ';

		if (!empty($column) && !empty($value)) {
			$sql .= "WHERE ".$column." = '".$value."' ";
		}

		$sql .= 'LIMIT 1';

		$exec = $this->db->prepare($sql);

		$exec->execute();

		$data = $exec->fetchAll(PDO::FETCH_OBJ);

		if (!$data) {
			return json(404,'No data in '.$this->table);
		} else {
			return json(200, $data[0]);
		}
	}

	public function deleteOne () {

	}

	public function updateOne ($column, $value, $id = false) {

		$sql = 'UPDATE `'.$this->table.'` SET '.$column.'=?';

		if (!$id) {
			$sql .= 'WHERE id = '.$_SESSION['user']['id'];
		} else {
			$sql .= 'WHERE id = '.$id;
		}

		$exec = $this->db->prepare($sql);

		$test = $exec->execute(array($value));

		if ($test) {
			return $test;
		} else {
			return $test;
		}

	}

	public function create ($data) {

		$keys = array_keys($data);
		$fields = '`'.implode('`, `',$keys).'`';

		$placeholder = substr(str_repeat("?,",count($keys)),0,-1);

		$sql = 'INSERT INTO `'.$this->table.'` ('.$fields.') VALUES ('.$placeholder.')';

		$exec = $this->db->prepare($sql);

		$exec->execute(array_values($data));

		return $this->db->lastInsertId();

	}
}