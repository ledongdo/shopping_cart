<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div class="cart">
        <div class="container">
            <div class="row">
            <table class="table update_cart_url" data-url="{{route('update-cart')}}">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ten san pham</th>
      <th scope="col">Gia</th>
      <th scope="col">Anh</th>
      <th scope="col">So luon</th>
      <th scope="col">Tong tien</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @php
        $total = 0;
      @endphp

      @foreach($carts as $key => $cart)

        @php
            $total += $cart['price'] * $cart['quantity'];
        @endphp
    <tr>
      <td>{{$key}}</td>
      <td>{{$cart['name']}}</td>
      <td>{{$cart['price']}}</td>
      <td>
          <img style="width: 200px;height: 200px;" src="{{$cart['image']}}" alt="">
      </td>
      <td>
          <input type="number" class="quantity" name="" value="{{$cart['quantity']}}" id="" min="1">
      </td>
      <td>{{$cart['price'] * $cart['quantity']}} VND</td>
      <td>
          <a class="btn btn-primary cart_update" data-id={{$key}} href="">Cap nhat</a>
          <a class="btn btn-danger" href="">Xoa</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
                <div class="col-md-12">
                    <h2>
                        Tong tien: {{$total }} VND
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cartUpdate (event) { 
            event.preventDefault();
            let url = $('.update_cart_url').data('url');
            let idProduct = $(this).data('id');
            let quantity = $(this).parents('tr').find('input.quantity').val();
            $.ajax({
                type: "GET",
                url: url,
                data: {id: idProduct, quantity: quantity},
                success: function (data) { 
                    if (data.code === 200) {
                        $('.cart').html(data.cartView);
                    }
                }, error : function () { 

                 }
            })
         }

         $(function () { 
             $(document).on('click', '.cart_update', cartUpdate);
          })
    </script>
</body>
</html>