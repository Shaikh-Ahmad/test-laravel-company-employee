@extends('layouts.app')
@section('content')
{{-- @if($errors->any())
<div class="error">{!! implode('', $errors->all('<div>:message</div>')) !!} </div>
@endif --}}
<form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
    <div class="form-group">
        @csrf
        <div class="card col-md-5 offset-md-3 my-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
            <div class="card-header">
               <b>Create Employee</b>
            </div>
            <div class="card-body" style="margin: 20px">
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input type="text" style="border-radius: 25px" name="firstname" id="firstname" class="form-control" value="{{old('firstname')}}" placeholder="First name" >
                    @error('firstname')
                        <div class="error"><p class="text-danger float-right" style="font-size: 12px">{{ $message }}</p></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input type="text" style="border-radius: 25px" name="lastname" id="lastname" class="form-control" value="{{old('lastname')}}" placeholder="lastname" >
                    @error('lastname')
                        <div class="error"><p class="text-danger float-right" style="font-size: 12px">{{ $message }}</p></div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="company_id">Company</label>
                    {{-- <input type="text" style="border-radius: 25px" name="company_id" class="form-control" value="{{old('company_id')}}" placeholder="company_id" > --}}
                    <select class="form-control" name="company_id">
                        <option value="" readonly>Choose a company</option>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                    </select>
                    @error('company_id')
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
                    <label for="phone">Phone</label>
                    <input type="number" style="border-radius: 25px" name="phone" class="form-control" value="{{old('phone')}}" placeholder="phone" >
                    @error('phone')
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