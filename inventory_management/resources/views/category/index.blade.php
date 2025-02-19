<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header d-flex justify-content-between align-item-center">
                            <h1>Inventory Management</h1>
                            <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a>
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
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td><span class="badge{{ $category->status == 1 ? ' bg-success' : ' bg-danger' }}">{{ $category->status == 1 ? ' Active' : ' Inactive' }}</span></td>
                                        <td>{{date('d M Y, h:i:s A', strtotime($category['created_at']))}}</td>
                                        <td>{{$category->updated_at != $category->created_at ? date('d M Y, h:i:s A', strtotime($category['updated_at'])) : 'NULL'}}</td>
                                        <td>Action</td>
                                        
                                        
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
