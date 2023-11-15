@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class='pt-5 fw-bold'>
                    <form action="{{ route('employee.store') }}" method="POST">
                        @csrf
                            <div class="form-group mt-3">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="first_name" class="form-control"
                                    placeholder="Cosmo">
                                @error('firstname')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="middlename">Middle Name</label>
                                <input type="text" name="middlename" id="middle_name" class="form-control"
                                    placeholder="">
                                @error('middlename')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="last_name" class="form-control"
                                    placeholder="Imai">
                                @error('lastname')
                                    <p class="fs-6 text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="form-group mt-3">
                                <label for="suffix">Suffix</label>
                                <select name="suffix" class="form-control" aria-placeholder="--Select">
                                    <option value="">N/A</option>
                                    @foreach ($suffix as $suf)
                                        <option value="{{ $suf }}">{{ $suf }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="float-end mt-4">
                                <button type="submit" class="btn btn-outline-primary shadow">Submit new employee </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
