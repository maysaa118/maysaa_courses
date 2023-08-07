
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('homepage')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Maysa'a Courses</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-list-alt"></i>
                    <span>Categories</span>
                </a>
                <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('categories.create')}}">Add Category</a>
                        <a class="collapse-item" href="{{ route('categories.index')}}">All Categories</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#courseCollapse"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-laptop"></i>
                    <span>Courses</span>
                </a>
                <div id="courseCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('courses.create')}}">Add Course</a>
                        <a class="collapse-item" href="{{ route('courses.index')}}">All Courses</a>
                        <a class="collapse-item" href="{{ route('registrations') }}">All Registrations</a>
                    </div>
                </div>
            </li>
          
          
        </ul>
        <!-- End of Sidebar -->

