<?php
use creepy\Controller\AbstractController;
use creepy\Model\Entity\Article;
use creepy\Model\Entity\Comment;
use creepy\Model\Manager\ArticleManager;
use creepy\Model\Manager\CommentManager;

$article = $data['article'];
?>

<div id="containerEdit">
    <div id="titleEdit">
        <h1>Modifier l'article</h1>
    </div>


    <div id="form-editArticle">
        <form action="/index.php?c=article&a=edit-article&id=<?= $article->getId() ?>" method="post">
            <div id="edit-Title">
                <label for="title">Titre de l'article</label>
                <input type="text" name="title" id="title" value="<?= $article->getTitle() ?>" required>
            </div>
            <div id="edit-Content">
                <label for="content"></label>
                <textarea name="content" id="content" cols="30" rows="20" required><?= $article->getContent() ?></textarea>
            </div>
            <div id="edit-valid">
                <input type="submit" name="save" value="Valider" class="save">
            </div>
        </form>
    </div>
</div>
