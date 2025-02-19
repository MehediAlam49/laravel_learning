<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container py-3 my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header d-flex justify-content-between align-item-center">
                            <h1>Product List</h1>
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Add New</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated by</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $Product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td><span class="badge{{ $product->status == 1 ? ' bg-success' : ' bg-danger' }}">{{ $product->status == 1 ? ' Active' : ' Inactive' }}</span></td>
                                        <td>{{date('d M Y, h:i:s A', strtotime($product['created_at']))}}</td>
                                        <td>{{$product->updated_at != $product->created_at ? date('d M Y, h:i:s A', strtotime($product['updated_at'])) : 'NULL'}}</td>
                                        <td>
                                            <div class="btn-group gap-2 d-flex justify-content-center" role="group">
                                                <a href="{{ route('product.status', $product->id) }}" class="btn btn-{{ $product->status == 1 ? 'danger' : 'success' }}">{{ $product->status == 1 ? 'Inactive' : 'Active' }}</a>

                                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')"}}">Delete</a>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
