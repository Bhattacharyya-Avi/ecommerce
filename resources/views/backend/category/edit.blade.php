@extends('backend.master')
@section('contents')
<form action="{{route('categoris.update', $category->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- <div class="custom-control custom-switch">
        <input @if ($category->is_parent ==1) checked @endif name="is_parent" type="checkbox" class="custom-control-input" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">Is Parent?</label>
    </div> --}}
    <div class="form-group">
        <label for="exampleFormControlInput1">Category Position 
            <span style="color: red">*</span>
        </label>
        <input value="{{$category->position}}" name="position" type="number" class="form-control" id="exampleFormControlInput1"
        placeholder="position number">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Parent Category
            <span style="color: red">*</span>
        </label>
        <select name="parent_id" class="form-control" id="exampleFormControlSelect1">
            @foreach ($parentCategories as $parentCategory)
                <option @if ($category->parent_id == $parentCategory->id) selected @endif value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
            @endforeach
        </select>
    </div>
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
    <button type="submit" class="btn btn-primary">update</button>
</form>
@endsection