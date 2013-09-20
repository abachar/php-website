{extends $layout}

{block name=content}
    <section class="container projects">
        <h1>Projets</h1>

        <div class="grid">
            {foreach $projects as $project}
                <article class="column">
                    <figure class="touchTouch" code="{$project->code}">
                        {if empty($project->images)}
                            <img src="/projects/assets/{$project->code}/thumbnail.jpg" />
                        {else}
                            {foreach $project->images as $image}
                                <a class="{if not $image@first}hidden{/if}" data-gallery="gallery-{$project->code}" href="/projects/assets/{$project->code}/gallery/{$image}">
                                    {if $image@first}
                                        <img src="/projects/assets/{$project->code}/thumbnail.jpg" />
                                        <span class="zoom"></span>
                                    {/if}
                                </a>
                            {/foreach}
                        {/if}
                    </figure>
                    <h4>{$project->name}</h4>
                    <div class="description">{$project->description|truncate:300|markdown}</div>
                </article>
            {/foreach}
        </div>
    </section>
{/block}