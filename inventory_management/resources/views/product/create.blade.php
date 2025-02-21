<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-3 py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header d-flex justify-content-between align-item-center">
                            <h1>Create Product</h1>
                            <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label for="category_id" class="form-label">Category</label>
                                  <select name="category_id" id="category_id" class="form-control">
                                    <option value=" " selected-hidden>Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="product Name" value="{{ old('name') }}">
                                  @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="price" class="form-label">Price</label>
                                  <input type="text" class="form-control" id="price" name="price" placeholder="product price" value="{{ old('price') }}">
                                  @error('price')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="image" class="form-label">Image</label>
                                  <input type="file" class="form-control" id="image" name="image">
                                  @error('image')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="status" class="form-label">Status</label>
                                  <select name="status" id="status" class="form-select">
                                    <option value=" " selected-hidden>Select option</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                  </select>
                                  @error('status')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="description" class="form-label">Description</label>
                                  <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                  @error('description')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
