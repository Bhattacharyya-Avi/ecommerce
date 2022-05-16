@extends('backend.master')
@section('contents')

<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Viewing product: </h5>
        <div class="card-body">
            <div class="col-12 col-xl-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Product Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <img width="500px" src="{{url('/uploads/product/',$product->image)}}" alt="">
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> &nbsp; {{$product->name}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Category:</strong>
                                &nbsp; {{$product->category->name}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Details:</strong> &nbsp; {{$product->details}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                    class="text-dark">Available quantity:</strong> &nbsp; {{$product->quantity}}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                class="text-dark">Unit price:</strong> &nbsp; {{$product->price}}</li>
                            <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Action:</strong> &nbsp;
                                <a class="btn btn-simple mb-0 ps-1 pe-2 py-0" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"/><path d="M5.5 20c.828 0 1.5.672 1.5 1.5S6.328 23 5.5 23 4 22.328 4 21.5 4.672 20 5.5 20zm13 0c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zM2.172 1.757l3.827 3.828V17L20 17v2H5c-.552 0-1-.448-1-1V6.413L.756 3.172l1.415-1.415zM16 3c.552 0 1 .448 1 1v2h2.993C20.55 6 21 6.456 21 6.995v8.01c0 .55-.45.995-1.007.995H8.007C7.45 16 7 15.544 7 15.005v-8.01C7 6.445 7.45 6 8.007 6h2.992L11 4c0-.552.448-1 1-1h4zm-6 5H9v6h1V8zm6 0h-4v6h4V8zm3 0h-1v6h1V8zm-4-3h-2v1h2V5z"/></svg>
                                </a>
                                <a class="btn btn-simple mb-0 ps-1 pe-2 py-0" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"/><path d="M19 14v3h3v2h-3.001L19 22h-2l-.001-3H14v-2h3v-3h2zm1.243-9.243c2.262 2.268 2.34 5.88.236 8.235l-1.42-1.418c1.331-1.524 1.261-3.914-.232-5.404-1.503-1.499-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.991-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451l8.432 8.446L12 21.485 3.52 12.993c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228 2.349-2.109 5.979-2.039 8.242.228z"/></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
</div>
</div>
@endsection
