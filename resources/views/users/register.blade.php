@extends('layouts.app')
@section('content')
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="{{ route('user.store') }}" method="POST">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input type="text" name="name" id=""
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="name">Your Name</label>
                                        @error('name')
                                            <p class="fs-6 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id=""
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="email">Your Email</label>
                                        @error('email')
                                            <p class="fs-6 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id=""
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                        @error('password')
                                            <p class="fs-6 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password_confirmation" id=""
                                            class="form-control form-control-lg" />
                                        <label class="form-label" for="password_confirmation">Repeat your password</label>
                                        @error('password_confirmation')
                                            <p class="fs-6 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div> --}}

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                                            href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a>
                                    </p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
