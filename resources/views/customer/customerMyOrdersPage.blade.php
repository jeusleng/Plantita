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


    <title>My Orders</title>

    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>
    
    <style>
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
    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show">
            <div class="container">
                <center>
                    {{ session('warning') }}
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <br><br>
    <div class="container">
        <center>
            <h1 style="font-family: 'Poppins', sans-serif; color: #198754;">ORDER HISTORY</h1>
           
        </center>

        <br>

        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered" style="font-family: 'Poppins', sans-serif;">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Amount Paid</th>
                            <th>GCash Reference Number</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><img src="{{ asset('public/' . $user->img) }}" alt="Plantita Image" style="height: 100px;"></td>
                                <td>{{ $user->itemdesc }}</td>
                                <td>{{ $user->price }}</td>
                                <td>{{ $user->amount }}</td>
                                <td>{{ $user->gcashrefno }}</td>
                                <td>
                                    @if ($user->status == 'On Process')
                                        <span style="color: orange">{{ $user->status }}</span>
                                    @elseif ($user->status == 'To be Delivered')
                                        <span style="color: blue">{{ $user->status }}</span>
                                    @elseif ($user->status == 'Paid')
                                        <span style="color: green">{{ $user->status }}</span>
                                    @elseif ($user->status == 'Cancelled')
                                        <span style="color: red">{{ $user->status }}</span>
                                    @else
                                        {{ $user->status }}
                                    @endif
                                </td>
                                <td>{{ $user->remarks }}</td>
                                <td>
                                    <form action="{{ route('customerOrders.destroy', $user->transno) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        

    </div>
    <br><br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
}
?>
