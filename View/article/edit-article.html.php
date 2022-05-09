<?php
use creepy\Controller\AbstractController;
use creepy\Model\Entity\Article;
use creepy\Model\Entity\Comment;
use creepy\Model\Manager\ArticleManager;
use creepy\Model\Manager\CommentManager;

$article = $data['article'];
?>

<div id="containerEdit">
    <h1>Modifier l'article</h1>

    <div id="form-editArticle">
        <form action="/index.php?c=article&a=edit-article&id=<?= $article->getId() ?>" method="post">
            <div id="edi-Title">
                <label for="title">Titre de l'article</label>
                <input type="text" name="title" id="title" value="<?= $article->getTitle() ?>" required>
            </div>
            <div id="edit-Content">
                <label for="content"></label>
                <textarea name="content" id="content" cols="30" rows="20" required><?= $article->getContent() ?></textarea>
            </div>

            <input type="submit" name="save" value="Valider" class="save">
        </form>
    </div>
</div>
