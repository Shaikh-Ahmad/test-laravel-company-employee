@extends('layouts.app')
@section('content')

    
    <div class="col-md-8 mx-auto">
        <h3>About Company</h3>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Company logo</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$company->id}}</th>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td><img src="{{asset('storage/logos/'.$company->logo)}}" alt="" width="100" height="100"></td>
                    <td class="px-0">
                        
                        <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                            <button class="btn btn-sm btn-outline-danger " type="submit" title="delete" >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
          </table>
    </div>

@endsection