<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipes</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Image</th>
          <th scope="col">Description</th>
          <th scope="col">Ingredients</th>
          <th scope="col">Category</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($recipes as $recipe)
        <tr>
          <td>{{ $recipe->id }}</td>
          <td>{{ $recipe->name }}</td>
          <td><img src="{{ asset('storage/'.$recipe->image)}}" class="img img-rounded" width="100" height="100"></td>
          <td>{{ $recipe->description }}</td>
          <td>{{ $recipe->ingredients }}</td>
          <td>{{ $recipe->category }}</td>
          <td>
            <a class="btn btn-warning btn-sm" href="{{ route('recipe.edit' , $recipe->id) }}"><i class="fa fa-edit"></i></a>
            <form action="{{route('recipe.destroy', $recipe->id)}}" onsubmit="return confirm('Do you want to delete this recipe?')" method="post">
              <!-- We will have to pass _method because default HTML doesn't support Delete method -->
              <input type="hidden" name="_method" value="DELETE">
              @csrf
              <button id="btnDelete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>