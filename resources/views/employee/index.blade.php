
@extends('layouts.app')
@section('content')

    <div class="col-md-8 mx-auto">
        <a href="{{ route('employee.create') }}" class="btn btn-primary">Create Employee</a>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>FirstName</th>
                <th>lastname</th>
                <th>Company</th>
                <th>Email</th>
                <th>phone</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
                @if ($employees->count() > 0)
                    @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{$employee->id}}</th>
                        <td>{{$employee->firstname}}</td>
                        <td>{{$employee->lastname}}</td>
                        <td><a href="{{ route('company.show', $employee->company->id) }}"><b>{{$employee->company->name}}</b></a></td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td class="px-0">
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                                <button class="btn btn-sm btn-outline-danger " type="submit" title="delete" >
                                Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                @else
                
                    <td>
                        <h5>There is no Employee to show, <a href="{{ route('employee.create') }}">create one</a> </h5>
                    </td>
                
                @endif
                
            </tbody>
          </table>
          {{ $employees->links() }}
    </div>

@endsection