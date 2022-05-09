@extends('backend.master')
@section('contents')
<form action="{{route('admin.categoris.update', $category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1">Category Name 
            <span style="color: red">*</span>
        </label>
        <input value="{{$category->name}}" name="name" type="text" class="form-control" id="exampleFormControlInput1"
        placeholder="category name">
    </div>
   
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Category Details
            <span style="color: red">*</span>
        </label>
        <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$category->details}}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection