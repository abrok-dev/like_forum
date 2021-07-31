<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ path('forum.index') }}">SymForum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
      {{    $currentRoute = Route::current()}}

            <li class="nav-item{{ current_route|split('.', 2)|first in ['forum', 'category', 'thread'] ? ' active' }}">
                <a class="nav-link" href="{{ path('forum.index') }}">Forums</a>
            </li>

            {{ include('partials/_nav_item.html.twig', {route: 'page.members', text: 'Liste des membres'}) }}

          
        </ul>
    </div>
</nav>