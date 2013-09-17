{extends $layout}

{block name=content}
    <section class="container grid">
        <h1 class="noprint">Curriculum Vita</h1>

        <div class="column-large first profile">

            <header class="toprint">
                <h1>Abdelhakim Bachar</h1>
                <ul>
                    <li><label>Téléphone</label>{$personalCard->mobile}</a></li>
                    <li><label>Adresse mail</label>{$personalCard->email}</a></li>
                    <li>{$personalCard->address}</li>
                </ul>
                <p class="title">{$personalCard->job}<br />{$personalCard->jobExt}</p>
                <!-- Objectifs -->
            </header>

            <h2 id="experiences">Expériences Professionnelles</h2>
            <dl>
                {foreach $experiences as $experience}
                    <dt>Du {$experience->startDate|date_format:"m/Y"}<br />
                        {if isset($experience->endDate)} Au {$experience->endDate|date_format:"m/Y"} {else} Jusqu'à aujourd'hui {/if}
                    </dt>
                    <dd>
                        <p><strong>{$experience->name}</strong> : {$experience->desc}</p>
                        <p>{$experience->job}</p>
                        {if isset($experience->roles)}
                            <ul>
                                {foreach $experience->roles as $role}
                                    <li>{$role}</li>
                                {/foreach}
                            </ul>
                        {/if}
                        {if isset($experience->methods)}
                            <p>Méthodologie de travail : {foreach $experience->methods as $method}<em>{$method}</em>{/foreach}</p>
                        {/if}
                        {if isset($experience->tools)}
                            <p>Outils et technologies : {foreach $experience->tools as $tool}<em>{$tool}</em>{/foreach}</p>
                        {/if}
                        <p>Durée : 
                            {if isset($experience->endDate)}
                                {get_duration($experience->startDate, $experience->endDate)}
                            {else}
                                {get_duration($experience->startDate)}
                            {/if}
                        </p>
                    </dd>
                {/foreach}
            </dl>

            <h2 id="projects">Projets Personnels</h2>
            <dl>
                {foreach $projects as $project}
                    <dt>{$project->name}</dt>
                    <dd>
                        <p>{$project->description}</p>
                        <p>Outils et technologies :{foreach $project->tools as $tool}<em>{$tool}</em>{/foreach}</p>
                    </dd>
                {/foreach}
            </dl>

            <h2 id="competences">Compétences</h2>
            <dl>
                {foreach $competences as $competence}
                    <dt>{$competence->category}</dt>
                    <dd>
                        {foreach $competence->items as $item}
                            <p>
                                {$item->name} {if isset($item->level)}{$item->level}{/if}
                                {if isset($item->items)}
                                    <ul>
                                        {foreach $item->items as $i}
                                            <li>{$i->name} {if isset($i->level)}<em>{$i->level}</em>{/if}</li>
                                        {/foreach}
                                    </ul>
                                {/if}
                            </p>
                        {/foreach}
                    </dd>
                {/foreach}
            </dl>

            <h2 id="studies">Formations</h2>
            <dl>
                {foreach $studies as $study}
                    <dt>{$study->date|date_format:"m/Y"}</dt>
                    <dd>
                        <p>{$study->desc}</p>
                        {if isset($study->grade)}
                            <p><em>{$study->grade}</em></p>
                        {/if}
                    </dd>
                {/foreach}
            </dl>

            <h2 id="languages">Langues</h2>
            <dl>
                {foreach $languages as $language}
                    <dt>{$language->language}</dt>
                    <dd>{$language->level}</dd>
                {/foreach}
            </dl>

            <h2 id="interets">Centre d'intérêt &amp; Loisirs</h2>
            <dl>
                {foreach $interests as $interest}
                    <dt>{$interest->title}</dt>
                    <dd>{$interest->detail}</dd>
                {/foreach}
            </dl>
        </div>

        <aside class="column noprint">

            <h2>Fiche Personnel</h2>
            <ul>
                <li><h5>{$personalCard->firstName} {$personalCard->lastName}</h5></li>
                <li><i class="icon phone"></i><a href="tel:{$personalCard->mobile}">{$personalCard->mobile}</a></li>
                <li><i class="icon mail"></i><a href="mailto:{$personalCard->email}">{$personalCard->email}</a></li>
                <li><i class="icon mail"></i><a href="mailto:{$personalCard->email2}">{$personalCard->email2}</a></li>
                <li><i class="icon facebook"></i><a href="{$personalCard->facebook}">Facebook</a></li>
                <li><i class="icon linkedin"></i><a href="{$personalCard->linkedin}">LinkedIn</a></li>
                <li><i class="icon viadeo"></i><a href="{$personalCard->viadeo}">Viadeo</a></li>
                <li><i class="icon house"></i>{$personalCard->address}</li>
                <li>{$personalCard->age} ans, {$personalCard->civil}</li>
            </ul>

            <h2>Navigations</h2>
            <ul>
                <li><a href="#experiences">Expériences Professionnelles</a></li>
                <li><a href="#projects">Projets Personnels</a></li>
                <li><a href="#competences">Compétences</a></li>
                <li><a href="#studies">Formations</a></li>
                <li><a href="#languages">Langues</a></li>
                <li><a href="#interets">Centre d'intérêt &amp; Loisirs</a></li>
            </ul>

            <h2>Impression</h2>
            <ul>
                <li><i class="icon print"></i><a href="#" class="feature-not-available">Imprimer</a></li>
                <li><i class="icon download"></i><a href="#" class="feature-not-available">Télécharger Format PDF</a></li>
                <li><i class="icon download"></i><a href="#" class="feature-not-available">Télécharger Format Word</a></li>
            </ul>
        </aside>
    </section>
{/block}