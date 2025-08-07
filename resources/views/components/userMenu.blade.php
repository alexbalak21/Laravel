 <div class="dropdown {{ $class }}">
     <button class="btn btn-outline-secondary dropdown-toggle"
         type="button"
         data-bs-toggle="dropdown"
         aria-expanded="false">
         <i class="fa-solid fa-user me-1"></i> {{ $name }}
     </button>
     <ul class="dropdown-menu dropdown-menu-end">
         <li><a class="dropdown-item" href="/profile">Profile</a></li>
         {{-- POST logout --}}
         <li><form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
        </form></li>
     </ul>
 </div>