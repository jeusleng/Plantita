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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

        <title>Login Required</title>
    </head>

    <body style="font-family: 'Poppins', sans-serif;">
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- datatable bootsrap --}}
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <title>Preview Orders</title>

    <script>
        $(document).ready(function() {
            $('#plantitas').DataTable();
        });
    </script>

    <style>
        .product-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #e2e2e2;
            border-radius: 5px;
        }

        .product-card img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product-card h5 {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .product-card p {
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
        }

        .total-price {
            font-weight: bold;
        }
    </style>
</head>

<body style="font-family: 'Poppins', sans-serif;">
    <br><br>
    <div class="container">
        <center>
            <h1>CHECKOUT PAGE</h1>
            <br>
            <a href="/customerMarketplace" class="btn btn-secondary">Cancel Transaction</a>
        </center>
        <br>

        <form action="{{ route('customerPayment.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Item Description</th>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>Gcash Number</th>
                        <th>GCash Reference Number</th>
                        <th>Enter Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td><img src="{{ asset('public/' . $order->img) }}" alt="Plantita Image" width="100"></td>
                            <td>{{ $order->itemdesc }}</td>
                            <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
                            <td>₱{{ $order->itemprice }}</td>
                            <td>{{ $order->gcash_no }}</td>
                            <td>
                                <div class="mb-3">
                                    <input type="text" name="gcash[]" value="{{ old('gcash')[$loop->index] ?? '' }}"
                                        class="form-control" id="gcashRef">
                                    @error('gcash')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <input type="text" name="amount[]" value="{{ old('amount')[$loop->index] ?? '' }}"
                                        class="form-control" id="gcashRef">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center total-price">
                Total: @foreach ($sum as $total)
                    {{ $total->totalprice }}
                @endforeach
            </div>
            <br>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-lg" value="CHECKOUT">
            </div>
        </form>
        
    </div>
</body>

</html>

<?php
}
?>
