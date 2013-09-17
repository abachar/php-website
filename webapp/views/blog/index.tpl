{extends $layout}

{block name=content}
    <section class="container blog">
        <h1>Blog</h1>

         {foreach $articles as $article}
            <article>
                <h3>
                    <time class="badge" datetime="{$article->date}">{$article->date|date_format:"d/m/Y"}</time>
                    <a href="/blog/{$article->code}">{$article->title}</a>
                </h3>
                <figure>
                    <a href="/blog/{$article->code}">
                        <img src="/blog/{$article->code}/assets/thumbnail.jpg" />
                    </a>
                </figure>
                <div class="description">
                    <p>{$article->description|nl2br}</p>
                    <a href="/blog/{$article->code}">Lire la suite</a>
                </div>
            </article>
        {/foreach}
    </section>
{/block}