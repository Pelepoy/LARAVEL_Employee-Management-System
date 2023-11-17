
@if (session()->has('success'))
    <div class="position-fixed bottom-0 end-0 me-5 pb-3" style="z-index: 1050">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Heyyy!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
