@extends('backend.master')
@section('contents')
<form action="{{route('setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="exampleFormControlInput1">Name 
            <span style="color: red">*</span>
        </label>
        <input value="{{$setting->name}}" name="name" type="text" class="form-control" id="exampleFormControlInput1"
        placeholder="product name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Email 
            <span style="color: red">*</span>
        </label>
        <input value="{{$setting->email}}" name="email" type="email" class="form-control" id="exampleFormControlInput1"
        placeholder="product name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Contact 
            <span style="color: red">*</span>
        </label>
        <input value="{{$setting->contact}}" name="contact" type="tel" class="form-control" id="exampleFormControlInput1"
        placeholder="product name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Address 
            <span style="color: red">*</span>
        </label>
        <input value="{{$setting->address}}" name="address" type="text" class="form-control" id="exampleFormControlInput1"
        placeholder="product name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">About
            <span style="color: red">*</span>
        </label>
        <textarea name="about" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$setting->about}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Slogan
            <span style="color: red">*</span>
        </label>
        <textarea name="slogan" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$setting->slogan}}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Facebook 
            <span style="color: red">*</span>
        </label>
        <input value="{{$setting->facebook}}" name="facebook" type="text" class="form-control" id="exampleFormControlInput1"
        placeholder="product name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Instragram 
            <span style="color: red">*</span>
        </label>
        <input value="{{$setting->instragram}}" name="instragram" type="text" class="form-control" id="exampleFormControlInput1"
        placeholder="product name">
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection