Mon site a comme th�me la m�t�o pour changer des th�mes sur HETIC. Je me suis inspir� des sites 
de m�t�o pour r�aliser le design. Les soleils sont r�alis�s en CSS. La page France n�est pas cod�e par 
manque de temps, c��tait surtout pour avoir un menu � 3 cat�gories. 
Au niveau des features du sondage, le sondage n�est faisable qu�une fois gr�ce aux sessions et en 
fonction du choix de r�ponse la page affichera un message et une image d�finie (un super subterfuge 
pour placer des chats discr�tement�). Les r�sultats des votes sont exprim�s en nombre de votes et 
en pourcentages par rapport au total.
La base de donn�e contient 2 tables : une enonce_question regroupant les �nonc�s et la table 
question1 qui comprend les r�ponses � la question d�id = 1, je n�ai pas pris la peine d�int�grer 
d�autres questions car la d�marche est la m�me : remplacer l�id par 2 etc  dans $query = $pdo-
>query('SELECT enonce FROM enonces_questions WHERE id = 1');
Et changer de table de r�ponses dans $query = $pdo->query('SELECT * FROM question1');
Il reste apr�s juste � changer les affichages des messages et images des r�sultats des questions.
Merci d�avance d�avoir pris le temps de regarder mon travail.
