<!doctype html>
<html lang="en">
    <head>
        <title>Home-Inventory Management</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container my-3">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">Inventory Management System</h1>
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h2>Category List</h2>
                                <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
                            </div>
                            <div class="card-body"></div>
                                <table class="table table-striped table-bordered table-hover align-middle text-center table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                {{-- <th scope="row">{{ $category->id }}</th> --}}
                                                <td>{{ $category->title }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->status }}</td>
                                                <td>{{ date('M d, Y, H:i:s A', strtotime($category->created_at)) }}</td>
                                                <td>{{ $category->updated_at != $category->created_at ? date('M d, Y, H:i:s A', strtotime($category->updated_at)) : '-' }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
