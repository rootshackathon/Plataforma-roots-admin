<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/framework/bootstrap/css/bootstrap.css?">
    <!-- Ico CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css?1.0.1.0" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css?">

    <title>Roots - Admin</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light header-default header-default-z mb-3">
        
        <a class="navbar-brand" href="/">
          <img class="logo-nav" src="/assets/imagens/logo.png" title="Roots">
        </a>
        
        @if(!Auth::guest())

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        @endif
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
          <ul class="navbar-nav mr-auto">
            @if(!Auth::guest())
              <li class="nav-item">
                  <a class="nav-link" href="/monitoramento" target="_blank">Monitor</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/regiao">Regiões</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/especie">Espécie</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/arvores">Árvores</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/manutencao">Manutenção</a>
              </li>  
            @endif
          </ul>
          
          <ul class="navbar-nav mt-2 mt-lg-0 justify-content-end">
            @if(!Auth::guest())
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-link text-color-white">
                    Sair
                  </button>
                </form>
              </li>
            @endif
          </ul>
        </div>
    </nav>

    <div class="page">
      
      @if (session()->get('sessaoMensagemRetornoAplicacao'))
        <div class="container-fluid">
          <div class="alert alert-{{session()->get('sessaoMensagemRetornoAplicacao')['class']}}" role="alert">
            {{ session()->get('sessaoMensagemRetornoAplicacao')['mensagem'] }}
          </div>
        </div>
      @endif
      
      @yield('content')
    
    </div>

    <!-- Jquery JS -->
    <script src="/assets/js/jquery/jquery.min.js?"></script>
    <script src="/assets/js/util.js?"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/framework/bootstrap/js/bootstrap.min.js?"></script>

    @yield('js')

  </body>
</html>