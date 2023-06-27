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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

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

    {{-- datatable bootsrap --}}
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <title>Marketplace</title>

    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>

    <style>
        .fab {
            position: fixed;
            bottom: 20px;
            right: 20px;
            border-radius: 30%;
            background-color: #4CAF50;
            color: white;
            width: 100px;
            height: 100px;
            text-align: center;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
        }

        .fab i {
            font-size: 50px;
            line-height: 56px;

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
            <a class="navbar-brand" href="#" style="font-family: 'Poppins', sans-serif; color: #198754; font-size:25px;">
                <img src="logo.png" alt="Logo" class="logo">
                |   CUSTOMER
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form action="customerMyAcc" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">My
                                Account</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="customerMarketplaceDirect" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">Browse
                                Marketplace</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="customerMyOrdersDirect" method="post">
                            @csrf
                            <button type="submit" class="nav-link" style="border: none; background: none; font-family: 'Poppins', sans-serif;">My
                                Orders</button>
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
            <div class="container">
                <center>
                    {{ session('success') }}
                </center>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <div class="container">
                <center>
                    {{ session('error') }}
                </center>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <br><br>
        <center>
            <h1 style="font-family: 'Poppins', sans-serif; color: #198754;">PLANTITA PRODUCTS</h1>
        </center>

        <br>
        <form action="customerPaymentDirect" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @foreach ($plantitas as $plantita)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ asset('public/' . $plantita->img) }}" class="card-img-top"
                                alt="Image" style="height: 250px;">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title" style="font-family: 'Poppins', sans-serif; font-weight:bold; color: #198754; font-size:30px;">{{ $plantita->itemdesc }}</h5>
                                    <p class="card-text" style="font-family: 'Poppins', sans-serif;">Price: ₱{{ $plantita->itemprice }}</p>
                                    <p class="card-text" style="font-family: 'Poppins', sans-serif;">Seller: {{ $plantita->first_name }} {{ $plantita->last_name }}</p>
                                
                                </center>
                                
                                <br>
                                <div class="form-check" style="margin-left:33%">
                                    <input class="form-check-input" type="checkbox" name="itemno[]"
                                        value="{{ $plantita->itemno }}">
                                    <label class="form-check-label" for="plantitaCheckbox" style="font-family: 'Poppins', sans-serif;">ADD TO CART</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        

                <div class="position-fixed bottom-0 end-0 mb-4 me-4">
            <button type="submit" class="btn btn-primary" style="font-family: 'Poppins', sans-serif; font-size:35px; width: 100%; background-color: #198754; border-color: transparent;">CHECKOUT</button>
        </div>
            </div>
        </form>
        <br><br>
    </div>
</body>

</html>

<?php

}
?>
