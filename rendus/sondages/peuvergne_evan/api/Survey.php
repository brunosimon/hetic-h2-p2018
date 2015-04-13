<?php


	class Survey {



		/*
			PROPERTIES
		*/

		
		private $bdd;



		
		/*
			CONSTRUCTOR
		*/


		function __construct ($pdo)
		{

			$this->bdd = $pdo;

		}



		/*
			CREATE
		*/


		public function create ($name, $image, $description, $password)
		{

			/* VALIDATE */

			$validate = [];

			if(empty($name) || !isset($name)) { $validate['name'] = 'Vous devez spécifier un nom'; }
			if(empty($image) || !isset($image) || !preg_match('@^(https?|ftp)://[^\s/$.?#].[^\s]*$@iS', $image)) { $validate['image'] = 'Vous devez fournir une url d\'image valide'; }
			if(empty($password) || !isset($password) || strlen($password) < 6 || strlen($password) > 255) { $validate['password'] = 'Vous devez choisir un mot de passe de plus de 6 caractères.'; }

			if(!empty($validate))
			{
				return array(
					'code' => 405,
					'response' => 'Certaines informations sont manquantes',
					'validate' => $validate
				);
			}


			/* UNIQUE */

			$req = $this->bdd->prepare('SELECT COUNT(id) AS number FROM surveys WHERE name = :name');
			$req->execute(array('name' => $name));
			$result = $req->fetch();
			if($result->number > 0)
			{
				return array(
					'code' => 403,
					'response' => 'Un sondage portant ce nom existe déjà.',
					'validate' => array(
						'name' => 'Un sondage portant ce nom existe déjà'
					)
				); 
			}


			/* SAVE */

			$req = $this->bdd->prepare('INSERT INTO surveys (name, image, description, password) VALUES (:name, :image, :description, :password)');
			$response = $req->execute(array
			(
				'name' => $name,
				'image' => $image,
				'description' => $description,
				'password' => hash('sha256', $password)
			));
			$id = $this->bdd->lastInsertId();


			/* CONNECT */

			// $_SESSION['coucou'] = 'hello';
			$_SESSION['surveys'][$id] = hash('sha256', $password);


			/* RETURN SUCCESS */

			return array(
				'code' => 201,
				'response' => 'Le sondage ' . $name . ' a bien été crée.',
				'id' => $id
			);


		}


	}