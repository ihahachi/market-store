@section('sidebar')

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-home"></i>
            <span>Accueil</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            <span>Vendeurs</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Les Bon's:</h6>
            <a class="dropdown-item" href="{{ url('ls_vendeurs') }}">Vendeurs</a>
            <a class="dropdown-item" href="{{ url('clients') }}">Clients</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Autres Pages:</h6>
            <a class="dropdown-item" href="{{ url('bs_sortie') }}">Bon Sortie</a>
            <a class="dropdown-item" href="{{ url('be_entre') }}">Bon Entrer</a>
          </div>
        </li>

        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cubes"></i>
                  <span>Articles</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <h6 class="dropdown-header">Liste des articles:</h6>
                  <a class="dropdown-item" href="{{ url('/articles') }}">Articles</a>
                  <a class="dropdown-item" href="{{ url('/articles/create') }}">Nouveau article</a>
                  <div class="dropdown-divider"></div>
                  <h6 class="dropdown-header">Autres Pages:</h6>
                  <a class="dropdown-item" href="{{ url('/ls_vendeurs') }}">Liste des vendeurs</a>
                </div>
              </li>




              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-boxes"></i>
                  <span>Stock</span>
                </a>

                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <h6 class="dropdown-header">Mouvement de stock</h6>
                  <a class="dropdown-item" href="{{ url('/stocks') }}">Stocks</a>
                  <a class="dropdown-item" href="{{ url('/stocks/out') }}">Stock Sortie</a>
                  <a class="dropdown-item" href="{{ url('/stocks/in') }}">Stock Entrer</a>
                  <a class="dropdown-item" href="{{ url('/stocks/perdu') }}">Stock Perdu</a>
                </div>
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-undo-alt"></i>
                  <span>Restauration</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <h6 class="dropdown-header">Res. Corbeille</h6>
                  <a class="dropdown-item" href="{{ url('/backup_vendeurs') }}">Vendeurs</a>
                  <a class="dropdown-item" href="#">Clients</a>
                  <a class="dropdown-item" href="{{ url('/backup_bonsorties') }}">Bon Sortie</a>
                  <a class="dropdown-item" href="#">Bon Entrer</a>



                </div>
              </li>

        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      </ul>
@endsection
