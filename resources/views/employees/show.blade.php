@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class='pt-5 fw-bold'>
                        <h1 class='text-center fs-3 pb-3 fw-bold'>Employee Informations</h1>
                        
                        <div class="form-group mt-3">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="first_name" class="form-control" readonly
                                value="{{ $employee->firstname }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="middlename">Middle Name</label>
                            <input type="text" name="middlename" id="middle_name" class="form-control" readonly 
                                value="{{ $employee->middlename }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="last_name" class="form-control" 
                            readonly value="{{ $employee->lastname }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="suffix">Suffix</label>
                           <input type="text" name="suffix" class="form-control" readonly value="{{ $employee->suffix }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
