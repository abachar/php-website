{extends $layout}

{block name=content}
    <section class="container grid contact">
        <h1>Me Contacter</h1>

        <div class="column-large">
            <p>Pour me contacter, veuillez remplir le formulaire ci-dessous<br />
                <small>Les champs marqués d'une * sont obligatoires.</small><br />
                <br />
            </p>

            <div class="messages">
                {foreach $errors as $error}
                    <p class="error">{$error}</p>
                {/foreach}
                {if $sent}
                    <p class="success">Merci, votre message a bien été envoyé.</p>
                {/if}
            </div>

            <form action="" method="post">
                <dl>
                    <dt><label for="name">Nom complet *</label></dt>
                    <dd><input type="text" name="name" value="{$name}" /></dd>
                </dl>
                <dl>
                    <dt><label for="email">Adresse mail *</label></dt>
                    <dd><input type="text" name="email" value="{$email}" /></dd>
                </dl>
                <dl>
                    <dt><label for="subject">Objet *</label></dt>
                    <dd><input type="text" name="subject" value="{$subject}" class="large" /></dd>
                </dl>
                <dl>
                    <dt><label for="message">Message *</label></dt>
                    <dd><textarea name="message" class="large" rows="8">{$message}</textarea></dd>
                </dl>
                <dl>
                    <dt />
                    <dd><button name="send" type="submit">Envoyer</button></dd>
                </dl>
            </form>
        </div>

        <aside class="column">
            <h2>Coordonnées</h2>
            <ul>
                <li><h5>{$personalCard->firstName} {$personalCard->lastName}</h5></li>
                <li><i class="icon phone"></i><a href="tel:{$personalCard->mobile}">{$personalCard->mobile}</a></li>
                <li><i class="icon mail"></i><a href="mailto:{$personalCard->email}">{$personalCard->email}</a></li>
                <li><i class="icon mail"></i><a href="mailto:{$personalCard->email2}">{$personalCard->email2}</a></li>
                <li><i class="icon facebook"></i><a href="{$personalCard->facebook}">Facebook</a></li>
                <li><i class="icon linkedin"></i><a href="{$personalCard->linkedin}">LinkedIn</a></li>
                <li><i class="icon viadeo"></i><a href="{$personalCard->viadeo}">Viadeo</a></li>
                <li><i class="icon house"></i>{$personalCard->address}</li>
            </ul>
        </aside>
    </section>
{/block}