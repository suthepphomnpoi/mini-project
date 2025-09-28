@extends('layouts.guest')


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8 col-12">
            <div class="card border mt-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">เข้าสู่ระบบ</h5>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="/auth/users/login">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-danger w-100">เข้าสู่ระบบ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
