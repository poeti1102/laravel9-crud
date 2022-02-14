<nav class="navbar navbar-expand-lg navbar-dark bg-primary m-2 p-2">
  <a class="navbar-brand" href="{{ route('recipe.index')}}">Cooking Recipe</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('recipe.index')}}">All Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('recipe.create')}}">Add New Recipe</a>
      </li>
    </ul>
  </div>
</nav>