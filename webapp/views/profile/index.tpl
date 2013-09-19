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
                    <dt>Du {$experience->start|date_format:"m/Y"}<br />
                        {if isset($experience->end)} Au {$experience->end|date_format:"m/Y"} {else} Jusqu'à aujourd'hui {/if}
                    </dt>
                    <dd>
                        <p><strong>{$experience->name}</strong> : {$experience->description}</p>
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
                        <p>Durée : {$experience->duration}</p>
                    </dd>
                {/foreach}
            </dl>

            <h2 id="projects">Projets Personnels</h2>
            <dl>
                {foreach $projects as $project}
                    <dt>{$project->name}</dt>
                    <dd>
                        <p>{$project->description}</p>
                        <p>Outils et technologies : {foreach $project->tools as $tool}<em>{$tool}</em>{/foreach}</p>
                    </dd>
                {/foreach}
            </dl>

            <h2 id="competences">Compétences</h2>
            <dl>
                {foreach $competences as $competence}
                    <dt>{$competence->name}</dt>
                    <dd>
                        <ul>
                            {foreach $competence->skills as $skill}
                                <li>{$skill->name} {if isset($skill->level)}<em>{$skill->level}</em>{/if}</li>
                            {/foreach}
                        </ul>
                    </dd>
                {/foreach}
            </dl>

            <h2 id="studies">Formations</h2>
            <dl>
                {foreach $studies as $study}
                    <dt>{$study->date|date_format:"m/Y"}</dt>
                    <dd>
                        <p>{$study->description}</p>
                        {if isset($study->grade)}
                            <p><em>{$study->grade}</em></p>
                        {/if}
                    </dd>
                {/foreach}
            </dl>

            <h2 id="languages">Langues</h2>
            <dl>
                {foreach $languages as $language}
                    <dt>{$language->name}</dt>
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
                {foreach $personalCard->emails as $email}
                    <li><i class="icon mail"></i><a href="mailto:{$email}">{$email}</a></li>
                {/foreach}
                <li><i class="icon facebook"></i><a href="{$personalCard->facebook}">Facebook</a></li>
                <li><i class="icon linkedin"></i><a href="{$personalCard->linkedin}">LinkedIn</a></li>
                <li><i class="icon viadeo"></i><a href="{$personalCard->viadeo}">Viadeo</a></li>
                <li><i class="icon house"></i>{$personalCard->address}</li>
                <li>{$personalCard->age}, {$personalCard->civil}</li>
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