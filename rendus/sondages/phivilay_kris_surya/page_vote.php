<?php
require "config.php";
require "header.php";
require "page/Vote.php";

$vote = false;
if(isset($_SESSION['user_id'])){
    $req = $pdo->prepare('SELECT * FROM votes WHERE ref = ? AND ref_id = ? AND user_id = ?');
    $req->execute(['articles', $_GET['id'], $_SESSION['user_id']]);
    $vote = $req->fetch();
}

$req = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
$req->execute([$_GET['id']]);
$post = $req->fetch();
    ?>

    <article class="anecdote">
        <h1><?= $post->titre; ?></h1>
        <p><?= $post->contenu ?></p>
    </article>

    <?php if($post->id == 9 || $post->id == 10 || $post->id == 11 || $post->id == 12 || $post->id == 13): ?>
    <div class="vote <?= Vote::getClass($vote); ?>" id="vote" data-ref="articles" data-ref_id="<?= $post->id ?>" data-user_id="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
        <div class="vote_bar">
            <div class="vote_progress" style="width:<?= ($post->like_count + $post->dislike_count) == 0 ? 100 : round(100 * ($post->like_count / ($post->like_count + $post->dislike_count))); ?>%;"></div>
        </div>
        <div class="buttons">
            <button class="vote_btn vote_like">Cool <span id="like_count"><?= $post->like_count ?></span></button>
            <button class="vote_btn vote_dislike">Nul </i> <span id="dislike_count"><?= $post->dislike_count ?></span></button>
        </div>
    </div>

    <?php endif; ?>