@extends('layouts.app')

@section('content')
<style>
body{
    background: linear-gradient(135deg,#0d6efd,#6f42c1);
}

.card{
    backdrop-filter: blur(10px);
}

.form-control{
    border-radius: 12px;
}

.btn{
    border-radius: 12px;
}
</style>
<div class="container d-flex justify-content-center align-items-center"
     style="min-height: 100vh;">

    <div class="card shadow-lg border-0 rounded-4" style="max-width:400px;width:100%;">
        <div class="card-body p-5">

            <div class="text-center mb-4">
                <h2 class="fw-bold">Vendor Login</h2>
                <p class="text-muted">Sign in to continue</p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="/vendor/login">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        class="form-control form-control-lg"
                        placeholder="Enter username"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control form-control-lg"
                        placeholder="Enter password"
                        required
                    >
                </div>

                <button class="btn btn-primary btn-lg w-100">
                    Login
                </button>
            </form>

        </div>
    </div>

</div>

@endsection