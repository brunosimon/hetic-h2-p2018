<?php
require "config.php";
require "header.php";

$req = $pdo->query('SELECT * FROM articles');
?>

<div class="titre">Anecdotes d'agence web</div>
	<div class="row">
		<?php foreach($req->fetchAll() as $post): ?>
    		<div class="anecdote">
        		<article>
            		<h1><?= $post->titre; ?></h1>
            		<p><?= $post->contenu ?></p>
            		<p><a href="page_vote.php?id=<?= $post->id; ?>">Voter ici</a></p>
				</article>
    <div class="vote">
        <div class="vote_bar">
            <div class="vote_progress" style="width:<?= ($post->like_count + $post->dislike_count) == 0 ? 100 : round(100 * ($post->like_count / ($post->like_count + $post->dislike_count))); ?>%;"></div>
        </div>
        	<div class="buttons">
            	<div class="vote_btn vote_like">Cool  <span id="like_count"><?= $post->like_count ?></span></div>
            		<div class="vote_btn vote_dislike">Nul  </i> <span id="dislike_count"><?= $post->dislike_count ?></span></div>
        		</div>
    		</div>
	</div>

<?php endforeach; ?>
</div>


