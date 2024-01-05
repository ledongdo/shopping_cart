<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('show-cart')}}" class="btn btn-primary m-3">
                        Show cart
                    </a>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                 src="{{$product->image}}" 
                 alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">
                        {{$product->description}}
                    </p>
                    <p class="card-text">
                        {{$product->price}} VND
                    </p>
                    <a href="#"
                    data-url="{{route('add-to-cart', ['id' => $product->id])}}"
                    class="btn btn-primary add_to_cart">
                        Them gio hang
                    </a>
                </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function addToCart(event) {
            event.preventDefault();
            let url = $(this).data('url');
            $.ajax({
               type: 'GET',
               url: url,
               dataType: 'json',
               success: function (data) { 
                    if (data.code === 200) {
                        alert('them thanh cong');
                    }
                },
                error: function () {

                }
            });
        }
        $(function () { 
            $('.add_to_cart').on('click', addToCart);
         });
    </script>
</body>
</html>