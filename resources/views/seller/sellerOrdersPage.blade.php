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
    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>
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
    <title>Order Listing</title>
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="container">
                <center>
                    {{ session('success') }}
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col text-center mt-5">
                <h1 style="font-family: 'Poppins', sans-serif; color: #198754;">CUSTOMER ORDER DETAILS</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <table id="plantitas" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Customer Name</th>
                            <th>Customer Gcash Number</th>

                            <th>Customer Payment Amount</th>
                            <th>Customer Gcash Reference Number</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plantitas as $plantita)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/images/' . $plantita->img) }}" alt="Plantita Image"
                                        width="250" height="250">
                                </td>
                                <td>
                                    {{ $plantita->itemdesc }}
                                </td>
                                <td>
                                    <span style="color: blue">{{ $plantita->price }}</span>

                                </td>
                                <td>
                                    {{ $plantita->first_name . ' ' . $plantita->last_name }}
                                </td>
                                <td>
                                    {{ $plantita->gcash_no }}
                                </td>
                                <td>
                                    @if ($plantita->amount >= $plantita->price)
                                        <span style="color: green">{{ $plantita->amount }}</span>
                                    @else
                                        <span style="color: red">{{ $plantita->amount }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $plantita->gcashrefno }}
                                </td>
                                <td>
                                    @if ($plantita->status == 'On Process')
                                        <span style="color: orange">{{ $plantita->status }}</span>
                                    @elseif ($plantita->status == 'To be Delivered')
                                        <span style="color: blue">{{ $plantita->status }}</span>
                                    @elseif ($plantita->status == 'Paid')
                                        <span style="color: green">{{ $plantita->status }}</span>
                                    @elseif ($plantita->status == 'Cancelled')
                                        <span style="color: red">{{ $plantita->status }}</span>
                                    @else
                                        {{ $plantita->status }}
                                    @endif
                                </td>
                                <td>
                                    {{ $plantita->remarks }}
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="/edit/{{ $plantita->transno }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <br><br>

</body>


</html>
<?php

}
?>
