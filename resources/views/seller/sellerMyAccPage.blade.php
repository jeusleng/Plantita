<?php

if(session('regno') == null){
    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .alert {
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .alert-warning h4 {
            font-size: 24px;
            font-weight: 700;
        }
    </style>

    <title>Login Required</title>
</head>

<body>

    
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="alert alert-warning text-center">
                    <h4> <a href="/login" style="font-family: 'Poppins', sans-serif; ">LOGIN FIRST</a></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
} else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: -60px;
        }

        .text-center {
            font-size: 36px;
            font-weight: 700;
        }

        .form-group label {
            font-weight: 700;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .logo {
            width: 20%;
            margin-right: 10px;
        }
    </style>
    <title>My Account</title>
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
    
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <center>
                {{ session('success') }}
            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <br><br><br>
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center mb-4">ACCOUNT DETAILS</h1>
                        @foreach ($users as $user)
                            <form>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName"
                                            value="{{ $user->first_name }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control" id="lastName"
                                            value="{{ $user->last_name }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address"
                                            value="{{ $user->address }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="birthday">Birthday</label>
                                        <input type="date" class="form-control" id="birthday"
                                            value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="gcashNo">GCash Number</label>
                                        <input type="text" class="form-control" id="gcashNo"
                                            value="{{ $user->gcash_no }}" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            value="{{ $user->username }}" readonly>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <a href="/edit/seller/{{ $user->regno }}" class="btn btn-primary"
                                style="width: 100%; background-color: #198754; border-color: transparent;">Edit My
                                Account</a><br><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>


</html>
<?php

}

?>
