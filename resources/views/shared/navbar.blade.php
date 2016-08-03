<nav class="navbar navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbartop" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{ route('home') }}" class="navbar-brand">Recipe Manager</a>
    </div>

     <div class="collapse navbar-collapse" id="navbartop">
       <ul class="nav navbar-nav">
         <li><a href="{{ route('recipes.index') }}">Recipes</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recipes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('recipes.index') }}">All</a></li>
            <li><a href="{{ route('recipes.batch.index') }}">Batches</a></li>
            <li><a href="{{ route('recipes.build.index') }}">Builds</a></li>
          </ul>
        </li>
       </ul>
     </div>




  </div>
</nav>
