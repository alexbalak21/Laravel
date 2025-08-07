 <div class="dropdown {{ $class }}">
     <button class="btn btn-outline-secondary dropdown-toggle"
         type="button"
         data-bs-toggle="dropdown"
         aria-expanded="false">
         {{ $name }}
     </button>
     <ul class="dropdown-menu dropdown-menu-end">
         <li><a class="dropdown-item" href="user.php">Modify User</a></li>
         <li><a class="dropdown-item" href="createProduct.php">Create Product</a></li>
         <li><a class="dropdown-item" href="login.php">Disconnect</a></li>
     </ul>
 </div>