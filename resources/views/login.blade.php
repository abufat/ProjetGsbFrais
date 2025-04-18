
@if (Session::get('id') > 0)
    <div class="collapse navbar-collapse" id="navbar-collapse-target">
        <ul class="nav navbar-nav">
            <li><a href="" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>
            <li><a href="" data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
        </ul>
    </div>
@else

    <div class="collapse navbar-collapse" id="navbar-collapse-target">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
        </ul>
    </div>
@endif
