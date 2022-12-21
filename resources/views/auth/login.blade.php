@extends('template.auth')

@section('title', 'Login Data Mahasiswa')

@section('content')
<div class="container mt-5">
    <div class="col-12">
        <h2 class="text-center"><b>Login</b><br>Data Mahasiswa</h3>
        <hr>
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection