
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
                        <li><a class="active" href="{{url('manager.home')}}">manager Dashboard</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Employees</span> </li>
                <li class="submenu">
                    <a href="#" class="">
                        <i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{url('manager/allemployees')}}">All Employees</a></li>
                        <li><a href="{{url('manager/addemployees/firspage')}}">Add Employees</a></li>
                        <li><a href="{{url('manager/holidays')}}">Holidays</a></li>
                        
                        <li><a href="{{url('manager/viewqualification')}}">Qualification</a></li>
                        <li><a href="leave-settings.html">Leave Settings</a></li>
                        
                        {{-- <li><a href="attendance-employee.html">Attendance (Employee)</a></li> --}}
                        <li><a href="{{url('manager/departments')}}">Departments</a></li>
                        <li><a href="{{url('manager/designations')}}">Designations</a></li>
                        {{-- <li><a href="{{url('manager/timediff')}}">Timesheet</a></li> --}}
                        <li><a href="{{url('manager/shift-scheduling')}}">Shift & Schedule</a></li>
                        <li><a href="{{url('manager/Assign-shift')}}">Assign shift</a></li>
                        {{-- <li><a href="overtime.html">Overtime</a></li> --}}
                    </ul>
                </li>
                
                <li class="submenu"> <a href="#" class="noti-dot"><i class="la la-file-o"></i> 
                    <span> Attendance</span> <span class="menu-arrow" ></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('manager.attendance-list')}}">Today's Attendance</a></li>
                        <li><a href="{{url('manager.detail-Attendance')}}">Attendance Details </a></li>
                        <li><a  href="{{url('manager.managertimeAdjustment')}}">Time Adjustments </a></li>
                     
                    
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="la la-file-o"></i> 
                    <span> Leaves</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('manager.managerleaves')}}">manager Leaves </a></li>
                        <li><a href="{{url('manager.leave-Assignment')}}">Leave Quota Assignment</a></li>
                    </ul>
                </li>

                <li> <a href="{{url('manager.managerfoodmenu')}}">
                    <i class="la la-apple"></i>
                    <span>Food Menu</span></a>
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
    
