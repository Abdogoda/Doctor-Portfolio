<header class="app-header">
 <nav class="navbar navbar-expand-lg navbar-light">
   <ul class="navbar-nav">
     <li class="nav-item d-block d-xl-none">
       <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
         <i class="ti ti-menu-2"></i>
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link nav-icon-hover" href="{{ route('admin.messages.index') }}">
         <i class="ti ti-bell-ringing"></i>
         @if (App\Models\Message::where('read', 0)->count() > 0)
         <div class="notification bg-primary rounded-circle"></div>
         @endif
       </a>
     </li>
     <li class="nav-item">
       <a class="nav-link nav-icon-hover" target="__blank" href="{{url('/')}}">
         <i class="ti ti-home"></i>
       </a>
     </li>
   </ul>
   <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
     <ul class="navbar-nav flex-row me-auto align-items-center justify-content-end">
       <li class="nav-item dropdown">
         <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
           aria-expanded="false">
           <img src="{{asset('assets/backend/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
         </a>
         <div class="dropdown-menu dropdown-menu-start dropdown-menu-animate-up" aria-labelledby="drop2">
           <div class="message-body">
             <a href="{{ route('admin.profile.index') }}" class="d-flex align-items-center gap-2 dropdown-item">
               <i class="ti ti-user fs-6"></i>
               <p class="mb-0 fs-3">حسابي</p>
             </a>
             <a href="{{ route('admin.settings.index') }}" class="d-flex align-items-center gap-2 dropdown-item">
               <i class="ti ti-mail fs-6"></i>
               <p class="mb-0 fs-3">الإعدادات</p>
             </a>
             <form action="{{ route('logout') }}" method="POST">
                 @csrf
                 <button type="submit" class="btn btn-outline-danger mx-3 mt-2 d-block">
                    <span>
                     <i class="ti ti-logout"></i>
                   </span>
                   <span class="hide-menu me-2">تسجيل الخروج</span>
                 </button>
             </form>
           </div>
         </div>
       </li>
     </ul>
   </div>
 </nav>
</header>