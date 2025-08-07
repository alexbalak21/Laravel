<x-layout title="Profile">
    <div class="col-lg-6 mx-auto col-12 mt-4">
        <h1 class="text-center">Profile</h1>
        <p class="text-center">You are logged in as {{ auth()->user()->name }}</p>

       <pre>
            @php
                $user = auth()->user();
                print_r($user);
            @endphp
        </pre>

    </div>
</x-layout>     