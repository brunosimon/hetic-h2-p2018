<?php


	class Issue {



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


		public function create ($title, $survey_id, $proposals)
		{


			/* FORMAT */

			if($survey_id) { $survey_id = intval($survey_id); }


			/* VALIDATE */

			$validate = [];


			// ISSUE

			if(!isset($title) || empty($title)) { $validate['title'] = 'Vous devez spécifier un titre à la question'; }


			// PROPOSALS

			foreach($proposals as $i=>$proposal)
			{
				if(!isset($proposal['name']) || empty($proposal['name']) || strlen($proposal['name']) > 150){ $validate['proposal-' . ($i+1) .'-name'] = 'Vous devez spécifier un intitulé valide à la réponse.'; }
				if(!isset($proposal['image']) || empty($proposal['image']) || !preg_match('@^(https?|ftp)://[^\s/$.?#].[^\s]*$@iS', $proposal['image'])){ $validate['proposal-' . ($i+1) .'-image'] = 'Vous devez spécifier une image valide'; }
			}

			if(!empty($validate))
			{
				return array(
					'code' => 405,
					'response' => 'Certaines informations sont manquantes.',
					'validate' => $validate
				);
			}


			/* UNIQUE IN SURVEY */

			$req = $this->bdd->prepare('SELECT COUNT(id) AS number FROM issues WHERE title = :title AND survey_id = :survey_id');
			$req->execute(array('title' => $title, 'survey_id' => $survey_id));
			$result = $req->fetch();
			if($result->number > 0)
			{
				return array(
					'code' => 403,
					'response' => 'Cette question existe déjà au sein de ce sondage.',
					'validate' => array(
						'title' => 'L\'intitulé de cette question est déjà utilisé'
					)
				); 
			}


			/* SAVE */


			// Issue

			$req = $this->bdd->prepare("INSERT INTO issues (title,survey_id) VALUES (:title, :survey_id)");
			$req->execute(array
			(
				'title' => $title,
				'survey_id' => $survey_id,
			));
			$issue_id = $this->bdd->lastInsertId();


			// Proposals

			foreach($proposals as $i=>$proposal)
			{

				$req = $this->bdd->prepare('INSERT INTO proposals (name, image, issue_id) VALUES (:name, :image, :issue_id)');
				$req->execute(array(
					'name' => $proposal['name'],
					'image' => $proposal['image'],
					'issue_id' => $issue_id
				));

			}


			return array(
				'code' => 201,
				'response' => 'La question a bien été ajoutée dans le sondage.',
				'issue' => array(
					'title' => $title,
					'survey_id' => $survey_id
				),
				'proposals' => $proposals
			);


		}



		/*
			VOTE
		*/


		public function vote ($proposal_id)
		{

			/* GET PROPOSAL */

			$proposal = $this->bdd->prepare('SELECT * FROM proposals WHERE id = :proposal_id');
			$proposal->execute(array(
				'proposal_id' => $proposal_id
			));
			$proposal = $proposal->fetch();
			
			
			/* UPDATE VOTE */

			$req = $this->bdd->prepare('UPDATE proposals SET votes = :votes WHERE id = :proposal_id');
			$req->execute(array(
				'votes' => (intval($proposal->votes) + 1),
				'proposal_id' => $proposal_id
			));

			
			/* GET STATS */


			// GET PROPOSALS DETAILS

			$proposals = $this->bdd->prepare('SELECT * FROM proposals WHERE issue_id = :issue_id');
			$proposals->execute(array(
				'issue_id' => $proposal->issue_id
			));
			$proposals = $proposals->fetchAll();


			// GET NUMBER OF VOTES

			$votes = 0;
			foreach($proposals as $proposal)
			{
				$votes += intval($proposal->votes);
			}


			return array(
				'code' => 201,
				'message' => 'Le vote a bien été actualisé',
				'proposals' => $proposals,
				'votes' => $votes
			);	

		}


	}