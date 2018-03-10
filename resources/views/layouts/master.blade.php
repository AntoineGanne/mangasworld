<!doctype html>
<html lang="fr">
    <head>
        {!! Html::style('assets/css/bootstrap.css') !!}
        {!! Html::style('assets/css/mangas.css') !!}
    </head>
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/ui-bootstrap-tpls.js') !!}
    {!! Html::script('assets/js/bootstrap.js') !!}

    <body class="body">
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar+ bvn"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/') }}">Mangas World</a>
                    </div>
                    @if (Session::get('id')==0)
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav navbar-right">                             
                            <li><a href="{{ url('/getLogin') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                        </ul> 
                    </div>
                    @endif
                    @if (Session::get('id')>0)
                    <div class="collapse navbar-collapse" id="navbar-collapse-target">
                        <ul class="nav navbar-nav">                           
                            <li><a href="{{ url('/listerMangas') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Lister</a></li>
                            <li><a href="{{ url('/listerGenres') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Mangas par genre</a></li>
                            <li><a href="{{ url('/ajouterManga') }}"data-toggle="collapse" data-target=".navbar-collapse.in">Ajouter</a></li>                       
                        </ul>  
                        <ul class="nav navbar-nav navbar-right">                             
                            <li><a href="{{ url('/signOut') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                        </ul>                         
                    </div>
                    @endif
                </div><!--/.container-fluid -->
            </nav>
        </div> 
        <div class="container">
			@yield('content')
        </div>
        <!-- A compléter avec les références des fichiers javascript -->
    </body>
</html>
