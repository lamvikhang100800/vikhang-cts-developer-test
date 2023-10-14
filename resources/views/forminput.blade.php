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
      <div style="border-radius: 10px ; text-align: center; margin: 0 auto;font-size: 25px; background-color:blue">
        <h1 style="color:white; padding:10px">FROM NHẬP LIỆU</h1>
      </div>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Thêm</button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Product Number</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Unit</th>
          <th scope="col">Product Price</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>



        </tr>
      </thead>
        <tbody>
          @foreach( $product as $key => $item)
          <tr>
            <td>{{$item->product_number}}</td>
            <td>{{$item->product_name}}</td>
            <td>{{$item->product_unit}}</td>
            <td>{{$item->product_price}}</td>
            <td>{{$item->category_name}}</td>
            <td>
              <a class="btn btn-danger" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" href="/delete/{{$item->product_id}}">Xóa</a>
              <a class="btn btn-secondary"  href="/show-update/{{$item->product_id}}">Sửa</a>
            </td>
          </tr>
          @endforeach
        
        </tbody>    
    </table>
    </div>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="/create-category" method="POST" >
          {{ csrf_field() }}
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Number</label>
            <input name='product_number' placeholder="" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Product Name</label>
            <input name='product_name' placeholder="" type=text" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Product Unit</label>
            <input name='product_unit' placeholder="" type="text" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Product price</label>
            <input name='product_price' placeholder="" type="number" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
              <select name='category_id' class="form-select" aria-label="Default select example">
                  <option selected>Chọn Category</option>
                  @foreach( $category as  $key =>  $cat)
                  <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                  @endforeach
              </select>
          </div>
         
          <button style='width:100%' type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>