<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    @include('navbar')
    <form action="" method="POST" enctype='multipart/form-data' class="col-4 offset-4">
      @csrf
      <fieldset>
        <legend class="w-auto">Create Recipe</legend>
        <div class="form-group">
          <label>Name</label>
          <input name="name" type="text" class="m-1 form-control" required>
        </div>
        <div class="form-group">
          <label>Description</label>
          <input name="description" type="text" class="m-1 form-control" required>
        </div>
        <div class="form-group">
          <label>Photo</label>
          <input name="image" type="file" class="m-1 form-control-file" required>
        </div>
        <div class="form-group">
          <label>Ingredients</label>
          <textarea name="ingredients" class="m-1 form-control" required rows="5"></textarea>
        </div>
        <label>Category</label>
        <select class="m-1 form-control" name="category">
          <option value="Food">Food</option>
          <option value="Drink">Drink</option>
        </select>

        
        <div class="d-grid gap-2 m-3">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </fieldset>
    </form>
  </div>
</body>

</html>