@extends('layouts.app')
@section('content')

    
    <div class="col-md-8 mx-auto">
        <a href="{{ route('company.create') }}" class="btn btn-primary">Create Company</a>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>logo</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
                @if ($companies->count() > 0)
                    @foreach ($companies as $key => $company )
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td><img src="{{asset('storage/logos/'.$company->logo)}}" alt="" width="100" height="100"></td>
                        <td class="px-0">
                            
                            <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('company.show', $company->id) }}" class="btn btn-sm btn-outline-dark">view</a>
                                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                <button class="btn btn-sm btn-outline-danger " type="submit" title="delete" >
                                Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                @else
                    <td>
                        <h5>There is no Company to show, <a href="{{ route('company.create') }}">create one</a> </h5>
                    </td>
                @endif
                
            </tbody>
          </table>
          {{ $companies->links() }}
    </div>

@endsection