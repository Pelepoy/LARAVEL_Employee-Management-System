@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class='pt-5 fw-bold'>
                    <form action="{{ route('employee.update', $employee->employee_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h1 class='text-center fs-3 pb-3 fw-bold'>Please Update Necessary Information</h1>
                        <div class="form-group mt-3">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="first_name" class="form-control" placeholder="Cosmo"
                                value="{{ $employee->firstname }}">
                            @error('firstname')
                                <p class="fs-6 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="middlename">Middle Name</label>
                            <input type="text" name="middlename" id="middle_name" class="form-control" placeholder=""
                                value="{{ $employee->middlename }}">
                            @error('middlename')
                                <p class="fs-6 text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="last_name" class="form-control" placeholder="Imai"
                                value="{{ $employee->lastname }}">
                            @error('lastname')
                                <p class="fs-6 text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group mt-3">
                            <label for="suffix">Suffix</label>
                            <select name="suffix" class="form-control">
                                <option value="">N/A</option>
                                @foreach ($suffix as $suf)
                                    <option value="{{ $suf }}" @if ($suf === $employee->suffix) selected @endif>
                                        {{ $suf }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="float-end mt-4">
                            <button type="submit" class="btn btn-success shadow">Update Employee Info </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
