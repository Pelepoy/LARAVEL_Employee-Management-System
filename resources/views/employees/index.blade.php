@extends('layouts.app')

@section('content')
<div class="px-5">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
</div>

    <div class="p-5">
       
        <div class='float-end mb-3'>
            <a href="{{ route('employee.create') }}" class='btn btn-primary shadow'>Add new employee</a>
        </div>

        <h1 class="fs-1 text-center mb-5">DARK CONTINENT EMPLOYEES</h1>

        <table class="table table-bordered shadow">

            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Suffix</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr class='text-capitalize'>
                        <td>{{ $employee->employee_id}}</td>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->middlename }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->suffix }}</td>
                        <td class="text-center">
                            <a href="{{ route('employee.edit', $employee->employee_id) }}" class="btn btn-success">EDIT</a> 
                            <a href="{{ route('employee.show', $employee->employee_id) }}" class="btn btn-info">SHOW</a>
                            <form action="{{ route('employee.destroy', $employee->employee_id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
