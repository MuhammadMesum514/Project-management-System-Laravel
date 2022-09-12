
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
                        <li><a class="active" href="{{route('manager.home')}}">manager Dashboard</a></li>
                    </ul>
                </li>
                <li> <a href="{{route('manager.managerproject')}}">
                    <i class="la la-user-secret"></i>
                    <span>Projects</span></a>
                </li>

                <li><a href="{{url('manager.managerbreaktimings')}}">
                    <i class="la la-hourglass-1"></i>
                    <span>Break Timings</span></a>
                </li>
                <li class="disabled"><a href="{{url('manager.Supervisors-N-Team')}}">
                    <i class="la la-user-secret" ></i>
                    <span>Supervisor and Teams</span></a>
                </li>
                <li class="disabled"><a href="{{url('manager.notifications')}}">
                    <i class="la la-bell-o" ></i>
                    <span>Notifications Management</span></a>
                </li>

                <li><a href="{{url('manager.employeeSeprations')}}"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>
                <li><a href="{{url('manager.file-import-export')}}"><i class="la la-external-link-square"></i> <span>Bulk Uploads</span></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
    
