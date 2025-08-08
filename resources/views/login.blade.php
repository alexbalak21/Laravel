<x-layout title="Login">
    <div class="col-lg-6 mx-auto col-12 mt-4">
        <h1 class="text-center">Login</h1>
        @if ($errors->any())
            <p class="text-danger text-center fs-5">{{ $errors->first() }}</p>
        @endif
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Name or Email</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login <i class="fa-regular fa-circle-right ms-1"></i></button>
            </div>
        </form>
    </div>
    </x-layout>