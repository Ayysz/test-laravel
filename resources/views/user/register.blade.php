@extends('app')

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
            @foreach($errors->all() as $err)
                <p class="alert alert-danger"> {{ $err }} </p>
            @endforeach
        @endif
        <form action="{{ route('register.act') }}" method="post">
            @csrf

            <div class="mb-3">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder=" Example: Mamat" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label>Username <span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" placeholder="Example: Ujang" value="{{ old('username') }}">
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" name="password" placeholder="**********" class="form-control">
            </div>
            <div class="mb-3">
                <label>Password Confrimation <span class="text-danger">*</span></label>
                <input type="password" name="password_confirm" class="form-control" placeholder="**********">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Register</button>
                <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection