@extends('backend.master')

@section('contents')
<hr>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Category
  </button>
<br><br>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">category list</h5>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Position</th>
                            <th>Parent</th>
                            <th>Details</th>
                            <th>Action</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key=>$category)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->position}}</td>
                            <td>{{$category->parent_id ? $category->isParent->name : ''}}</td>
                            <td>{{$category->details}}</td>
                            <td>
                                
                                <form action="{{route('categoris.destroy',$category->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"  >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 6V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5zm6.414 8l1.768-1.768-1.414-1.414L12 12.586l-1.768-1.768-1.414 1.414L10.586 14l-1.768 1.768 1.414 1.414L12 15.414l1.768 1.768 1.414-1.414L13.414 14zM9 4v2h6V4H9z"/></svg>
                                    </button>
                                </form>  
                                <a  href="{{route('categoris.edit',$category->id)}}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.626 3.132L9.29 10.466l.008 4.247 4.238-.007 7.331-7.332A9.957 9.957 0 0 1 22 12c0 5.523-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2c1.669 0 3.242.409 4.626 1.132zm3.86-1.031l1.413 1.414-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z"/></svg>
                                </a>
                                
                                {{-- <a href="{{route('admin.categoris.destroy',$category->id)}}"></a> --}}
                                
                                
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
            <form action="{{route('categoris.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="custom-control custom-switch">
                    <input name="is_parent" type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">Is Parent?</label>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Category Position 
                        <span style="color: red">*</span>
                    </label>
                    <input name="position" type="number" class="form-control" id="exampleFormControlInput1"
                    placeholder="position number">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Parent Category
                        <span style="color: red">*</span>
                    </label>
                    <select name="parent_id" class="form-control" id="exampleFormControlSelect1">
                            <option value="">select if parent</option>
                        @foreach ($parentCategories as $parentCategory)
                            <option value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Category Name 
                        <span style="color: red">*</span>
                    </label>
                    <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                    placeholder="category name">
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Category Details
                        <span style="color: red">*</span>
                    </label>
                    <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
