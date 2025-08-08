<x-layout title="Profile">
    <div class="col-lg-6 mx-auto col-12 mt-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
       

        <div id="update_profile_form">
        <form action="/user/update_profile" method="POST">
            @csrf
            @method('PUT')
            <h1 class="text-center mt-5">Profile</h1>
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
        <div class="text-center mt-5">
            <button id="show_update_password_form" type="button" class="btn btn-primary">Update Password <i class="fa-solid fa-key ms-1"></i></button>
        </div>
        </div>



        <div id="update_password_form" class="d-none">
        <form action="/user/update_password" method="POST">
            @csrf
            @method('PUT')
            <h1 class="mt-5 text-center">Update Password</h1>
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
                <button type="submit" id="update_password" class="btn btn-success">Update <i class="fa-solid fa-key ms-1"></i></button>
            </div>
        </form>
        <div class="text-center mt-5">
        <button id="show_update_profile_form" type="button" class="btn btn-primary">Update Profile <i class="fa-solid fa-user ms-1"></i></button>
        </div>
        </div>
    </div>

    <script>
        const updateProfileButton = document.getElementById('update_profile');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        
        // Get initial values
        const initialName = nameInput.value;
        const initialEmail = emailInput.value;
        
        // Disable button initially if no changes
        updateProfileButton.disabled = true;
        
        function checkChanges() {
            const currentName = nameInput.value;
            const currentEmail = emailInput.value;
            
            // Enable button only if there are changes
            updateProfileButton.disabled = (currentName === initialName && currentEmail === initialEmail);
        }
        
        // Add event listeners
        nameInput.addEventListener('input', checkChanges);
        emailInput.addEventListener('input', checkChanges);
        
        // Password update button handling
        const updatePasswordButton = document.getElementById('update_password');
        updatePasswordButton.disabled = true;
        const passwordInput = document.getElementById('password');
        const newPasswordInput = document.getElementById('new_password');
        const confirmNewPasswordInput = document.getElementById('confirm_new_password');
       
        passwordInput.addEventListener('input', checkPasswordChanges)
        newPasswordInput.addEventListener('input', checkPasswordChanges)
        confirmNewPasswordInput.addEventListener('input', checkPasswordChanges)

        function checkPasswordChanges() {
          if (passwordInput.value.length < 6 || newPasswordInput.value.length < 6 || confirmNewPasswordInput.value.length < 6) {
            updatePasswordButton.disabled = true;
          }
          if (newPasswordInput.value != confirmNewPasswordInput.value) {
            updatePasswordButton.disabled = true;
          }
          else{
            updatePasswordButton.disabled = false;
          }
        }
        document.getElementById('show_update_password_form').addEventListener('click', function() {
          document.getElementById('update_password_form').classList.remove('d-none');
          document.getElementById('update_password_form').classList.add('d-block');
          document.getElementById('update_profile_form').classList.remove('d-block');
          document.getElementById('update_profile_form').classList.add('d-none');
        })
        document.getElementById('show_update_profile_form').addEventListener('click', function() {
          document.getElementById('update_profile_form').classList.remove('d-none');
          document.getElementById('update_profile_form').classList.add('d-block');
          document.getElementById('update_password_form').classList.remove('d-block');
          document.getElementById('update_password_form').classList.add('d-none');
        })
    </script>
</x-layout>     