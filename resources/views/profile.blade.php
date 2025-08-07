<x-layout title="Profile">
    <div class="col-lg-6 mx-auto col-12 mt-4">
        <h1 class="text-center">Profile</h1>
        <p class="text-center">You are logged in as {{ auth()->user()->name }}</p>

        <form action="/profile" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>
            <h4 class="mt-5 text-secondary   text-center">Change Password</h4>
            <div class="mb-3">
                <label for="password" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div>
                 <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div>
                 <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" required>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Update <i class="fa-solid fa-floppy-disk ms-1"></i></button>
            </div>
        </form>

    </div>
</x-layout>     