<nav class="navbar bg-light navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!-- Brand / Title -->
                <h6 class="navbar-brand">Laravel</h6>

                <!-- Username + User Menu (before toggler so it stays beside it on small screens) -->
                <div class="d-lg-none d-flex align-items-center ms-auto me-1">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="user.php">Modify User</a></li>
                            <li><a class="dropdown-item" href="createProduct.php">Create Product</a></li>
                            <li><a class="dropdown-item" href="/logout">Disconnect</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Burger toggler (always on screen) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible nav -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                       <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                       <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                    </ul>

                    <!-- Right-aligned Username + Menu for large screens -->
                    <div class="d-none d-lg-flex align-items-center">
                        <span class="me-2 text-dark small">
                            <i class="fa-solid fa-user me-1"></i><strong>User</strong>
                        </span>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                User Menu
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="user.php">Modify User</a></li>
                                <li><a class="dropdown-item" href="createProduct.php">Create Product</a></li>
                                <li><a class="dropdown-item" href="login.php">Disconnect</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>