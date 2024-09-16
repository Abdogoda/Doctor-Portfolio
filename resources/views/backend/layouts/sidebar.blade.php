<aside class="left-sidebar">
 <!-- Sidebar scroll-->
 <div>
   <div class="brand-logo d-flex align-items-center justify-content-between">
     <a href="{{route('admin.dashboard')}}" class="text-nowrap logo-img">
       <img src="{{$global_settings['logo'] ? asset('storage/'.$global_settings['logo']) : asset('assets/backend/images/logos/icon.png')}}" width="80px" alt="logo-icon" />
     </a>
     <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
       <i class="ti ti-x fs-8"></i>
     </div>
   </div>
   <!-- Sidebar navigation-->
   <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
     <ul id="sidebarnav">
       <li class="nav-small-cap">
         <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
         <span class="hide-menu">لوحة التحكم</span>
       </li>
       <li class="sidebar-item">
         <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
           <span>
             <i class="ti ti-layout-dashboard"></i>
           </span>
           <span class="hide-menu">الرئيسية</span>
         </a>
       </li>
       <li class="sidebar-item">
         <a class="sidebar-link" href="{{route('admin.services.index')}}" aria-expanded="false">
           <span>
             <i class="fa fa-hand-holding-heart"></i>
           </span>
           <span class="hide-menu">الخدمات</span>
         </a>
       </li>
       <li class="sidebar-item">
         <a class="sidebar-link" href="{{route('admin.media.index')}}" aria-expanded="false">
           <span>
             <i class="fa fa-images"></i>
           </span>
           <span class="hide-menu">ميديا</span>
         </a>
       </li>
       <li class="sidebar-item">
         <a class="sidebar-link" href="{{route('admin.messages.index')}}" aria-expanded="false">
           <span>
             <i class="fa fa-envelope"></i>
           </span>
           <span class="hide-menu">الرسائل</span>
         </a>
       </li>
       <li class="sidebar-item">
         <a class="sidebar-link" href="{{ route('admin.settings.index') }}" aria-expanded="false">
           <span>
             <i class="ti ti-settings"></i>
           </span>
           <span class="hide-menu">الإعدادات</span>
         </a>
       </li>
       <li class="sidebar-item">
         <a class="sidebar-link" href="{{ route('admin.schedules.index') }}" aria-expanded="false">
           <span>
             <i class="fa fa-clock"></i>
           </span>
           <span class="hide-menu">جدول المواعيد</span>
         </a>
       </li>
       <li class="sidebar-item">
         <a class="sidebar-link" href="{{ route('admin.about.index') }}" aria-expanded="false">
           <span>
             <i class="fa fa-user-doctor"></i>
           </span>
           <span class="hide-menu">معلومات الطبيب</span>
         </a>
       </li>
       <li class="sidebar-item">
         <a class="sidebar-link" href="{{ route('admin.backgrounds.index') }}" aria-expanded="false">
           <span>
             <i class="fa fa-file-image"></i>
           </span>
           <span class="hide-menu">الخلفيات</span>
         </a>
       </li>
       <li class="sidebar-item my-2 mt-5">
         <form action="{{ route('logout') }}" method="POST" style="display: inline;">
             @csrf
             <button type="submit" class="btn btn-danger py-2 px-4 ms-3">
                <span>
                 <i class="ti ti-logout"></i>
               </span>
               <span class="hide-menu me-2">تسجيل الخروج</span>
             </button>
         </form>
       </li>
     </ul>
   </nav>
   <!-- End Sidebar navigation -->
 </div>
 <!-- End Sidebar scroll-->
</aside>