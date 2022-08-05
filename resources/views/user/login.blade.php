@extends('app')

@section('content')

<div class="row">
    <div class="col-md-6">
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        
        @if($errors->any())
            @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif

        <form action="{{ route('login.act') }}" method="post">
            @csrf
            <div class="mb-3">
                <label>Username <span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control" value="{{ old('username')}}">
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
                <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection