
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i>
                        <span> Dashboard</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a class="active" href="{{route('admin.home')}}">Admin Dashboard</a></li>
                    </ul>
                </li>
                

                <li> <a href="{{route('admin.teams')}}">
                    <i class="la la-user-secret"></i>
                    <span>Teams</span></a>
                </li>

                <li><a href="{{route('admin.allProjects')}}">
                    <i class="la la-hourglass-1"></i>
                    <span>Projects</span></a>
                </li>
             
               

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
    
