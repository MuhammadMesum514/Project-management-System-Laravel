
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
                        <li><a class="active" href="{{url('admin.home')}}">Admin Dashboard</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Employees</span> </li>
                <li class="submenu">
                    <a href="#" class="">
                        <i class="la la-user"></i> <span> Project</span> <span class="menu-arrow"></span>
                    </a>
                    <ul >
                        <li><a href="{{route('admin.teams')}}">Teams</a></li>
                        <li><a href="{{url('admin/addemployees/firspage')}}">Add Employees</a></li>
                        <li><a href="{{url('admin/holidays')}}">Holidays</a></li>
                        
                        <li><a href="{{url('admin/viewqualification')}}">Qualification</a></li>
                        <li><a href="leave-settings.html">Leave Settings</a></li>
                        
                        {{-- <li><a href="attendance-employee.html">Attendance (Employee)</a></li> --}}
                        <li><a href="{{url('admin/departments')}}">Departments</a></li>
                        <li><a href="{{url('admin/designations')}}">Designations</a></li>
                        {{-- <li><a href="{{url('admin/timediff')}}">Timesheet</a></li> --}}
                        <li><a href="{{url('admin/shift-scheduling')}}">Shift & Schedule</a></li>
                        <li><a href="{{url('admin/Assign-shift')}}">Assign shift</a></li>
                        {{-- <li><a href="overtime.html">Overtime</a></li> --}}
                    </ul>
                </li>
                
                <li class="submenu"> <a href="#" class="noti-dot"><i class="la la-file-o"></i> 
                    <span> Attendance</span> <span class="menu-arrow" ></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('admin.attendance-list')}}">Today's Attendance</a></li>
                        <li><a href="{{url('admin.detail-Attendance')}}">Attendance Details </a></li>
                        <li><a  href="{{url('admin.admintimeAdjustment')}}">Time Adjustments </a></li>
                     
                    
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="la la-file-o"></i> 
                    <span> Leaves</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('admin.adminleaves')}}">Admin Leaves </a></li>
                        <li><a href="{{url('admin.leave-Assignment')}}">Leave Quota Assignment</a></li>
                    </ul>
                </li>

                <li> <a href="{{url('admin.adminfoodmenu')}}">
                    <i class="la la-apple"></i>
                    <span>Food Menu</span></a>
                </li>

                <li><a href="{{url('admin.adminbreaktimings')}}">
                    <i class="la la-hourglass-1"></i>
                    <span>Break Timings</span></a>
                </li>
                <li class="disabled"><a href="{{url('admin.Supervisors-N-Team')}}">
                    <i class="la la-user-secret" ></i>
                    <span>Supervisor and Teams</span></a>
                </li>
                <li class="disabled"><a href="{{url('admin.notifications')}}">
                    <i class="la la-bell-o" ></i>
                    <span>Notifications Management</span></a>
                </li>

                <li><a href="{{url('admin.employeeSeprations')}}"><i class="la la-external-link-square"></i> <span>Resignation</span></a></li>
                <li><a href="{{url('admin.file-import-export')}}"><i class="la la-external-link-square"></i> <span>Bulk Uploads</span></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
    
