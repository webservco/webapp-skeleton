<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <a class="app-nav navbar-brand" href="<?=$this->data('url/app', '/')?>App/home">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
        <?php foreach ([
            'dashboard' => 'Dashboard (Home alias)',
            'Devel/noexist' => 'Noexist',
            ] as $location => $title) { ?>
            <li class="nav-item<?=$this->data('location/current') == $location ? ' active' : ''?>">
                <a class="app-nav nav-link" href="<?=$this->data('url/app', '/')?><?=$location?>"><?=$title?></a>
            </li>
        <?php } ?>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown">
                <a class="app-nav dropdown-item" href="#">Item</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="btn btn-primary my-2 my-sm-0" href="https://github.com/webservco/webapp-skeleton">GitHub</a>
        </li>
    </ul>
</div>
</nav>
