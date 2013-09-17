<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>{$personalCard->firstName} {$personalCard->lastName}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {include "head.tpl"}
</head>
<body>

    <header class="noprint">
        <div class="container">
            <div class="logo">
                <a href="/">{$personalCard->firstName} {$personalCard->lastName}</a>
            </div>
            <nav>
                <ul>

                    <li class="{if $controller eq 'home'}active{/if}"><a href="/">Accueil</a></li>
                    <li class="{if $controller eq 'profile'}active{/if}"><a href="/profile">Profil</a></li>
                    <li class="{if $controller eq 'projects'}active{/if}"><a href="/projects">Projets</a></li>
                    <li class="{if $controller eq 'blog'}active{/if}"><a href="/blog">Blog</a></li>
                    <li class="{if $controller eq 'contact'}active{/if}"><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="content">
        <div class="top-separator noprint"></div>
        {block name=content}{/block}
    </div>

    <footer calss="noprint">
        <div class="container">
            <p class="copyright">Copyright © 2008 <a href="/">{$smarty.server.SERVER_NAME}</a></p>
            <nav>
                <ul>
                    <li><a class="first" href="/">Accueil</a></li>
                    <li class="divider">|</li>
                    <li><a href="/profile">Profil</a></li>
                    <li class="divider">|</li>
                    <li><a href="/projects">Projets</a></li>
                    <li class="divider">|</li>
                    <li><a href="/blog">Blog</a></li>
                    <li class="divider">|</li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </footer>

</body>
</html>
