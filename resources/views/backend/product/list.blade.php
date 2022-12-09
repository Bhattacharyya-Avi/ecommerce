@extends('backend.master')

@section('contents')
<hr>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add
  </button>
<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Product list</h5>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th>Details</th>
                            <th>Action</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img width="150px" src="{{url('/uploads/product',$product->image)}}" alt="">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->details}}</td>
                            <td>  
                                <a href="{{route('admin.product.edit',$product->id)}}" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 19h1.414l9.314-9.314-1.414-1.414L5 17.586V19zm16 2H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L9.243 19H21v2zM15.728 6.858l1.414 1.414 1.414-1.414-1.414-1.414-1.414 1.414z"/></svg></a>
                                <a href="{{route('admin.product.delete',$product->id)}}" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-4.586 6l1.768 1.768-1.414 1.414L12 15.414l-1.768 1.768-1.414-1.414L10.586 14l-1.768-1.768 1.414-1.414L12 12.586l1.768-1.768 1.414 1.414L13.414 14zM9 4v2h6V4H9z"/></svg></a>
                                <a href="{{route('admin.product.view',$product->id)}}" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2zm0 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zm0 3a5 5 0 1 1-4.78 3.527A2.499 2.499 0 0 0 12 9.5a2.5 2.5 0 0 0-1.473-2.28c.466-.143.96-.22 1.473-.22z"/></svg></a>
                                
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('product.add')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name 
                        <span style="color: red">*</span>
                    </label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                    placeholder="product name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">category 
                        <span style="color: red">*</span>
                    </label>
                    <select name="category" class="form-control" id="exampleFormControlSelect1">
                        <option></option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Details
                        <span style="color: red">*</span>
                    </label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Image 
                        <span style="color: red">*</span>
                    </label>
                    <input name="image" type="file" class="form-control" id="exampleFormControlInput1"
                    placeholder="category name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Quantity 
                        <span style="color: red">*</span>
                    </label>
                    <input name="quantity" type="number" class="form-control" id="exampleFormControlInput1"
                    placeholder="product quantity">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Unit price 
                        <span style="color: red">*</span>
                    </label>
                    <input name="price" type="number" class="form-control" id="exampleFormControlInput1"
                    placeholder="product quantity">
                </div>
                
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
