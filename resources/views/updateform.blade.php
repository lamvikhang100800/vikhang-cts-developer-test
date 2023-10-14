<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    @foreach( $product as  $key =>  $product)
        <form action="/update/{{$product->product_id}}" method="POST" class="row g-3" style=" margin-top: 50px; " >
             {{ csrf_field() }}
            <div class="col-md-12 text-bg-primary p-3" style="border-radius: 10px ; text-align: center; margin: 0 auto;font-size: 25px">
                    FROM CẬP NHẬT 
            </div>
            
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Product Number</label>
                <input type="text" value="{{$product->product_number}}" placeholder="{{$product->product_number}}" name='product_number' class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Product Name</label>
                <input type="text" value="{{$product->product_name}}" placeholder="{{$product->product_name}}" name='product_name' class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Product Unit</label>
                <input type="text" value="{{$product->product_unit}}" placeholder="{{$product->product_unit}}" name='product_unit' class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Product Price</label>
                <input type="number" value="{{$product->product_price}}" placeholder="{{$product->product_price}}" name='product_price' class="form-control" id="inputEmail4">
            </div>
            
           
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Product Price</label>
                @foreach($category as $key => $cat)
                <input readonly type="number" value="" placeholder="{{{$cat->category_name}}}"  class="form-control" id="inputEmail4">
                @endforeach
            </div>
        
            <div class="col-12">
                <button style=" width:100%" type="submit" class="btn btn-primary">CẬP NHẬT </button>
            </div>
        </form>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>