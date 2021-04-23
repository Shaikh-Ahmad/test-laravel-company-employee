@extends('layouts.app')
@section('content')
{{-- @if($errors->any())
<div class="error">{!! implode('', $errors->all('<div>:message</div>')) !!} </div>
@endif --}}
<form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
    <div class="form-group">
        @csrf
        <div class="card col-md-5 offset-md-3 my-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
            <div class="card-header">
                Create Company
            </div>
            <div class="card-body" style="margin: 20px">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" style="border-radius: 25px" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="name" >
                    @error('name')
                        <div class="error"><p class="text-danger float-right" style="font-size: 12px">{{ $message }}</p></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" style="border-radius: 25px" name="email" class="form-control" value="{{old('email')}}" placeholder="email" >
                    @error('email')
                        <div class="error"><p class="text-danger float-right" style="font-size: 12px">{{ $message }}</p></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" style="border-radius: 25px" name="logo" class="form-control" value="{{old('logo')}}" placeholder="logo" >
                    @error('logo')
                        <div class="error"><p class="text-danger float-right" style="font-size: 12px">{{ $message }}</p></div>
                    @enderror
                </div>
                <div class="form-group float-right ml-4" >
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div> 	   
        </div>
    </div>
</form>
@endsection