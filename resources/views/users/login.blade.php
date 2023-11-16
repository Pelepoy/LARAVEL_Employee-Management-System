@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Admi Login</h2>
        <div class="text-center mb-5 text-dark">Sicmundus Creatus Est</div>
        <div class="card my-5">

          <form action="{{ route('user.authenticate')}}" method="POST" class="card-body cardbody-color p-lg-5">
            @csrf
            <div class="text-center">
              <img src="{{ asset('images/staff.png') }}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" name="email" class="form-control" id="Username" aria-describedby="emailHelp"
                placeholder="Email">
                @error('email')
                <p class="fs-6 text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 mb-5 w-100">Login</button>
            </div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
              Registered? <a href="{{ route('user.register')}}" class="text-dark fw-bold"> Create an
                Account</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
@endsection
