<?php
    use creepy\Controller\AbstractController;
    use creepy\Model\Entity\Article;
    $articles = $data['articles'];
?>
<div id="container-article">
    <div class="divTitle">
        <h1>Liste des Articles</h1>
    </div>
    <div id="container-global">
        <div id="article-show"><?php
            foreach ($articles as $article) {
                ?>
                <div class="article">
                <h3 class="title"><?= $article->getTitle() ?></h3>
                <br>
                <p class="content"><?= $article->getContent() ?></p>
                <div class="author">
                    <h4 >Autheur : <span class="spanAut"><?= $article->getUserFk()->getPseudo() ?></span></h4>
                    <a href="/index.php?c=article&a=show-article&id">Voir</a>
                </div>

                </div><?php
            } ?>

        </div>
        <div class="articleForm">
            <h3 style="text-align: center">Ajoutez un article</h3>
            <form action="/index.php?c=article&a=list-article" method="post" id="">
                <div>
                    <input type="text" placeholder="Titre de l'article">
                </div>
                <div>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Texte de l'article"></textarea>
                </div>
                <div>
                    <input type="submit" value="créer">
                </div>
            </form>
        </div>
    </div>
</div>