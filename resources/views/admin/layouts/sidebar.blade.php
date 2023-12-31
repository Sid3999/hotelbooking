 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">

         <!-- Sidebar user panel (optional) -->
         {{-- <div class="user-panel">
             <div class="pull-left image">
                 <img src="{{ asset('images/users/'.Auth::user()->image) }}" class="img-circle" alt="User Image">
             </div>
             <div class="pull-left info">
                 <p>{{ Auth::user()->name }}</p>
                 <!-- Status -->
                 <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
             </div>
         </div> --}}

         <!-- search form (Optional) -->
         <!-- /.search form -->

         <!-- Sidebar Menu -->
         <ul class="sidebar-menu" data-widget="tree">
             <!-- Optionally, you can add icons to the links -->

             <li>
                 <a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i>
                     <span>Dashboard</span>
                 </a>
             </li>
             <!-- super admin authintication -->
             @if (Auth::user()->roles->first()->id == 1)
                 <li class="treeview">
                     {{-- <a href="#">
                         <i class="fa fa-hotel"></i>
                         <span>Hotels Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('hotel.index') }}">
                                 <i class="fa fa-hotel"></i>
                                 <span>Hotels</span>
                             </a>
                         </li>
                     </ul> --}}
                
                     <li class="treeview">
                     <a href="#">
                         <i class="fa fa-users"></i>
                         <span>User Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('users.index') }}">
                                 <i class="fa fa-users"></i>
                                 <span>Users</span>
                             </a>
                         </li>
                         
                         {{-- <li class="{{ request()->is('permission.index') ? 'active' : '' }}">
                             <a href="{{ route('permission.index') }}"><i class="fa fa-lock"></i>
                                 <span>Permissions</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('role.index') ? 'active' : '' }}">
                             <a href="{{ route('role.index') }}"><i class="fa fa-shield"></i>
                                 <span>Roles</span>
                             </a>
                         </li> --}}
                     </ul>
                  
                        <a href="#">
                           <i class="fa fa-hotel"></i>
                           <span>Hotel Management</span>
                           <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                           </span>
                       </a>
                       <ul class="treeview-menu">
                           <li class="{{ request()->is('users*') ? 'active' : '' }}">
                               <a href="{{ url('/hotel') }}">
                                   <i class="fa fa-hotel"></i>
                                   <span>Hotel Information</span>
                               </a>
                           </li>
                       </ul>
                 
                     <a href="#">
                        <i class="fa fa-dollar"></i>
                        <span>Payments</span>
                        <span class="pull-right-container">
                            <span class="fa fa-angle-left pull-right"></span>
                        </span>
                     </a>
                     <ul class="treeview-menu">
                        <li class="{{request()->is('payments*') ? "active" : ""}}">
                            <a href="{{route('payments.index')}}">
                                <i class="fa fa-users"></i>
                                <span>Manage Payments</span>
                            </a>
                        </li>
                     </ul>
                     <a href="#">
                         <i class="fa fa-users"></i>
                         <span>City Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('cities.index') }}">
                                 <i class="fa fa-users"></i>
                                 <span>City</span>
                             </a>
                         </li>
                     </ul>
                     <a href="#">
                        <i class="fa fa-edit"></i>
                        <span>Blogs Management</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ request()->is('users*') ? 'active' : '' }}">
                            <a href="{{ url('blogs') }}">
                                <i class="fa fa-users"></i>
                                <span>Blogs</span>
                            </a>
                        </li>
                    </ul>
                     @endif
             <!-- super admin end -->
             @if (Auth::user()->roles->first()->id == 3)
                 {{-- <li class="treeview">
                     <a href="#">
                         <i class="fa fa-hotel"></i>
                         <span>Hotels Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('hotel.index') }}">
                                 <i class="fa fa-hotel"></i>
                                 <span>Hotels</span>
                             </a>
                         </li>
                     </ul>
                 </li> --}}
                <li class = "treeview">
                 <a href="#">
                    <i class="fa fa-hotel"></i>
                    <span>Hotel Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('users*') ? 'active' : '' }}">
                        <a href="{{ url('/hotel') }}">
                            <i class="fa fa-hotel"></i>
                            <span>Hotel Information</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class = "treeview">
                <a href="#">
                   <i class="fa fa-hotel"></i>
                   <span>Invoice Management</span>
                   <span class="pull-right-container">
                       <i class="fa fa-angle-left pull-right"></i>
                   </span>
               </a>
               <ul class="treeview-menu">
                   <li class="{{ request()->is('users*') ? 'active' : '' }}">
                       <a href="{{ url('/invoices/index') }}">
                           <i class="fa fa-hotel"></i>
                           <span>Invoices</span>
                       </a>
                   </li>
               </ul>
           </li>
            
                 <li class="treeview">
                     <a href="#">
                         <i class="fa fa-home"></i>
                         <span>Category Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('room-category.index') }}">
                                 <i class="fa fa-bars"></i>
                                 <span>Room Category</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('permission.index') ? 'active' : '' }}">
                             <a href="{{ route('room-category-service.index') }}"><i class="fa fa-bars"></i>
                                 <span>Room Category Service</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('role.index') ? 'active' : '' }}">
                             <a href="{{ route('room-category-gallery.index') }}"><i class="fa fa-bars"></i>
                                 <span>Room Category Gallery</span>
                             </a>
                         </li>
                     </ul>
                 </li>
              
                 <li class="treeview">
                         <a href="#">
                             <i class="fa fa-home"></i>
                             <span>Rooms Management</span>
                             <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                         </a>
                         <ul class="treeview-menu">
                             <li class="{{ request()->is('hotel-rooms.index') ? 'active' : '' }}">
                                 <a href="{{ route('hotel-rooms.index') }}">
                                     <i class="fa fa-bars"></i>
                                     <span>Rooms</span>
                                 </a>
                             </li>
                             <li class="{{ request()->is('permission.index') ? 'active' : '' }}">
                                 <a href="{{ route('room-booking.index') }}"><i class="fa fa-bars"></i>
                                     <span>Room Booking</span>
                                 </a>
                             </li>

                         </ul>
                     </li>
                     <li class="treeview">
                         <a href="#">
                             <i class="fa fa-home"></i>
                             <span>Facility Management</span>
                             <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                         </a>
                         <ul class="treeview-menu">
                             <li class="{{ request()->is('facilities.index') ? 'active' : '' }}">
                                 <a href="{{ route('facilities.index') }}">
                                     <i class="fa fa-bars"></i>
                                     <span>Facility</span>
                                 </a>
                             </li>
                         </ul>
                     </li>

                    
                 <!-- <li class="treeview">
                     <a href="#">
                         <i class="fa fa-users"></i>
                         <span>User Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('users.index') }}">
                                 <i class="fa fa-users"></i>
                                 <span>Users</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('permission.index') ? 'active' : '' }}">
                             <a href="{{ route('permission.index') }}"><i class="fa fa-lock"></i>
                                 <span>Permissions</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('role.index') ? 'active' : '' }}">
                             <a href="{{ route('role.index') }}"><i class="fa fa-shield"></i>
                                 <span>Roles</span>
                             </a>
                         </li>
                     </ul>
                 </li> -->
             @endif
             @if (Auth::user()->roles->first()->id ==2)
                 <li class="treeview">
                     <a href="#">
                         <i class="fa fa-hotel"></i>
                         <span>Booking Requests</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('room-booking.index') }}">
                                 <i class="fa fa-hotel"></i>
                                 <span>Bookings</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- <li class="treeview">
                     <a href="#">
                         <i class="fa fa-home"></i>
                         <span>Category Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('room-category.index') }}">
                                 <i class="fa fa-bars"></i>
                                 <span>Room Category</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('permission.index') ? 'active' : '' }}">
                             <a href="{{ route('room-category-service.index') }}"><i class="fa fa-bars"></i>
                                 <span>Room Category Service</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('role.index') ? 'active' : '' }}">
                             <a href="{{ route('room-category-gallery.index') }}"><i class="fa fa-bars"></i>
                                 <span>Room Category Gallery</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="treeview">
                     <a href="#">
                         <i class="fa fa-home"></i>
                         <span>Rooms Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('hotel-rooms.index') ? 'active' : '' }}">
                             <a href="{{ route('hotel-rooms.index') }}">
                                 <i class="fa fa-bars"></i>
                                 <span>Rooms</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('permission.index') ? 'active' : '' }}">
                             <a href="{{ route('room-category-service.index') }}"><i class="fa fa-bars"></i>
                                 <span>Room Booking</span>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="treeview">
                     <a href="#">
                         <i class="fa fa-users"></i>
                         <span>User Management</span>
                         <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                         </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="{{ request()->is('users*') ? 'active' : '' }}">
                             <a href="{{ route('users.index') }}">
                                 <i class="fa fa-users"></i>
                                 <span>Users</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('permission.index') ? 'active' : '' }}">
                             <a href="{{ route('permission.index') }}"><i class="fa fa-lock"></i>
                                 <span>Permissions</span>
                             </a>
                         </li>
                         <li class="{{ request()->is('role.index') ? 'active' : '' }}">
                             <a href="{{ route('role.index') }}"><i class="fa fa-shield"></i>
                                 <span>Roles</span>
                             </a>
                         </li>
                     </ul>
                 </li> --}}
             @endif

         </ul>
         <!-- /.sidebar-menu -->
     </section>
     <!-- /.sidebar -->
 </aside>
 
