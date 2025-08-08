<x-layout title="Profile">
    <div class="col-lg-6 mx-auto col-12 mt-4">
        <h1 class="text-center">Profile</h1>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/user/update_profile" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" id="update_profile">Update<i class="fa-solid fa-user ms-1"></i></button>
            </div>
        </form>
        <form action="/user/update_password" method="POST">
            @csrf
            @method('PUT')
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
                <button type="submit" class="btn btn-primary">Update <i class="fa-solid fa-key ms-1"></i></button>
            </div>
        </form>
    </div>
    <script>
        const updateProfileButton = document.getElementById('update_profile');
        updateProfileButton.disabled = true;
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const name = nameInput.value;
        const email = emailInput.value;   
        nameInput.addEventListener('input', change) 
        emailInput.addEventListener('input', change)

        function change() {
            console.log("change");
            if (name == nameInput.value && email == emailInput.value) {
                console.log("same");
                updateProfileButton.disabled = true;

            }
            else{
                updateProfileButton.disabled = false;
            }
        }
    </script>
</x-layout>     