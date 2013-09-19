{extends $layout}

{block name=content}
    <section class="container article">
        <h1>{$article->title}</h1>

        <div>
            {if $article->printable}
                <p class="printfriendly noprint"><i class="icon print"></i><a href="#" class="feature-not-available">Imprimer l'article</a></p>
            {/if}
            <small>
                <time datetime="{$article->date}">{$article->date|date_format:"d/m/Y"}</time>, {$article->author}
            </small>
        </div>

        {if $article->draft}
            <p class="warning">Cet article est en cours de rédaction, et ne constitue donc pour l’instant qu’une simple introduction. 
                Il fera l’objet d’un redécoupage, d'une refonte et d’un approfondissement conséquent par la suite.</p>
        {/if}

        <div class="article-text">
            {$article->contents|markdown}
        </div>
    </section>
{/block}