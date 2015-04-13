<?php

	/* SESSIONS */
	session_start();

	include 'config.php';
	include 'Survey.php';
	include 'Issue.php';

	/*
		DISPATCHER
	*/

	if(!empty($_POST))
	{

		switch($_POST['route'])
		{

			case 'survey':
				$survey = new Survey($pdo);
				render($survey->create($_POST['params']['name'], $_POST['params']['image'], $_POST['params']['description'], $_POST['params']['password']));
			break;

			case 'issue':
				$issue = new Issue($pdo);
				render($issue->create($_POST['params']['title'], $_POST['params']['survey_id'], $_POST['params']['proposals']));
			break;

			case 'vote':
				$issue = new Issue($pdo);
				render($issue->vote($_POST['params']['proposal_id']));
			break;

		}

	}