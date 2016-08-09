<ul class="nav navbar-nav navbar-left">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recipes<span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li>{{ link_to_route('app.recipes.index', "All") }}</li>
      <li>{{ link_to_route('app.recipes.batch.index', "Batch") }}</li>
      <li>{{ link_to_route('app.recipes.build.index', "Build") }}</li>
    </ul>
  </li>
</ul>

<ul class="nav navbar-nav navbar-right">
  @if( Auth::check())
    <li>{{ link_to('/logout', 'Logout') }}</li>
  @else
    <li>{{ link_to('/login', 'Login') }}</li>
  @endif
</ul>
