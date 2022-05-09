@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    {{-- <button type="button" class="close" data-dismiss="alert">×</button>     --}}

    <strong> 
       {{-- <i class="material-icons">done</i> --}}
        {{ $message }}
    </strong>

</div>

@endif

  

@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

    {{-- <button type="button" class="close" data-dismiss="alert">×</button>     --}}

    <strong>
       {{-- <i class="material-icons" style="color:red">priority_high</i> --}}
        {{ $message }}
    </strong>

</div>

@endif

   

@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-block">

    {{-- <button type="button" class="close" data-dismiss="alert">×</button>     --}}

    <strong>
        {{-- <i class="material-icons">perm_device_information</i> --}}
        {{ $message }}
    </strong>

</div>

@endif

   

@if ($message = Session::get('info'))

<div class="alert alert-info alert-block">

    {{-- <button type="button" class="close" data-dismiss="alert">×</button>     --}}

    <strong>
      {{-- <i class="material-icons">receipt</i> --}}
      {{ $message }}
    </strong>

</div>

@endif

  

@if ($errors->any())

<div class="alert alert-danger">

    {{-- <button type="button" class="close" data-dismiss="alert">×</button>     --}}

    {{-- <i class="material-icons" style="color:red">priority_high</i> --}}
    Please check the form below for errors

</div>

@endif