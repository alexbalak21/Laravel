 <div class="dropdown {{ $class }}">
     <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center"
         type="button"
         data-bs-toggle="dropdown"
         aria-expanded="false">
         <span class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 28px; height: 28px; flex-shrink: 0;">
            {{ strtoupper(substr($name, 0, 1)) }}
         </span>
         <span class="text-nowrap">{{ $name }}</span>
     </button>
     <ul class="dropdown-menu dropdown-menu-end">
         <li><a class="dropdown-item" href="/profile">Profile <i class="fa-regular fa-address-card me-1"></i></a></li>
         {{-- POST logout --}}
         <li><form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">Logout <i class="fa-solid fa-right-from-bracket me-1"></i></button>
        </form></li>
     </ul>
 </div>