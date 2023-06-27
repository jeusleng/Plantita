<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    

    <title>{{ session('regno') == null ? 'Login Required' : 'Edit My Plantita' }}</title>

    <style>
        body {
        margin-top: 0;
        padding-top: 0;
        font-family: 'Poppins', sans-serif;

    }

    .logo {
        width: 20%;
        margin-right: 10px;
    }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/customerPage" style="font-family: 'Poppins', sans-serif; color: #198754; font-size:25px;">
                <img src="logo.png" alt="Logo" class="logo">
                |   SELLER
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form action="sellerMyAcc" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">My
                                Account</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="sellerPlantitaDirect" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">My Products</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="sellerOrdersDirect" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">Orders</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if(session('regno') == null)
                        <h4> <a href="/login" style="font-family: 'Poppins', sans-serif; ">LOGIN FIRST</a></h4>
                        @else
                            <h1 class="text-center mb-4">Edit Plantita</h1>

                            @foreach ($plantitas as $plantita)
                                <form action="{{ $plantita->itemno }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="desc" class="form-label">Item Description</label>
                                                <input type="text" class="form-control" id="desc" placeholder="Enter Description" name="desc"
                                                    value="{{ $plantita->itemdesc }}">
                                                @error('desc')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Item Price</label>
                                                <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price"
                                                    value="{{ $plantita->itemprice }}">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="mb-3">
                                        <label for="currentImg" class="form-label">Current Image</label>
                                        <div>
                                            <img src="{{ asset('public/' . $plantita->img) }}" alt="Current Image"
                                                style="max-width: 200px;">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="img" class="form-label">Upload Image</label>
                                        <input type="file" class="form-control" id="img" name="img">
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-grid gap-2">
                                            <input type="submit" class="btn btn-success" value="Update">
                                            <a href="/sellerMyPlantita" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
