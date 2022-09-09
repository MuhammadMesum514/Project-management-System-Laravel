
    <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a  href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a  href="{{route('user.home')}}">Employee Dashboard</a></li>
                    </ul>
                </li>
                
                <li class="menu-title"> 
                    <span>Employees</span>
                </li>
            
                <li><a href="{{route('user.followupform')}}">
                    <i class="la la-file-word-o"></i>
                    <span>Follow Up Form</span></a>
                </li>   
               
                    </ul>
              
        </div>
    </div>
</div>

<!-- /Sidebar -->