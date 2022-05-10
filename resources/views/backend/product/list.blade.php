@extends('backend.master')

@section('contents')
<hr>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style=" margin-left: 15px; !important; ">
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
                                <a class="btn btn-info" href="{{route('admin.categoris.edit',$product->id)}}" ><i class="material-icons">edit</i></a>
                                <a class="btn btn-info" href="{{route('admin.categoris.edit',$product->id)}}" ><i class="material-icons">edit</i></a>
                                   
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.product.add')}}" method="POST" enctype="multipart/form-data">
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
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
    </div>
</div>
</div>



{{-- </div> --}}

@endsection
