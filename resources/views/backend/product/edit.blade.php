@extends('backend.master')
@section('contents')
<form action="{{route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="exampleFormControlInput1">Name 
            <span style="color: red">*</span>
        </label>
        <input value="{{$product->name}}" name="name" type="text" class="form-control" id="exampleFormControlInput1"
        placeholder="product name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">category 
            <span style="color: red">*</span>
        </label>
        <select name="category" class="form-control" id="exampleFormControlSelect1">
            <option></option>
            @foreach($categories as $category)
            <option @if($product->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
    </div>
   
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Details
            <span style="color: red">*</span>
        </label>
        <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$product->details}}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Image 
            <span style="color: red">*</span>
        </label>
        <input name="image" type="file" class="form-control" id="exampleFormControlInput1"
        placeholder="category name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Previous Image 
        </label>
        @if ($product->image != null)
        <img width="200px" src="{{url('/uploads/product/',$product->image)}}" alt="">
        @else
        <p>No image found.</p>
        @endif
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Quantity 
            <span style="color: red">*</span>
        </label>
        <input value="{{$product->quantity}}" name="quantity" type="number" class="form-control" id="exampleFormControlInput1"
        placeholder="product quantity">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Unit price 
            <span style="color: red">*</span>
        </label>
        <input value="{{$product->price}}" name="price" type="number" class="form-control" id="exampleFormControlInput1"
        placeholder="product quantity">
    </div>
    
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection