<!-- BEGIN: Top Bar -->
<div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
    <div class="flex items-center h-full">
        <!-- BEGIN: Logo -->
        <a href="" class="hidden -intro-x md:flex">
            <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.png') }}">
            <span class="ml-3 text-lg text-white">
                PPAL
            </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <nav aria-label="breadcrumb" class="h-full mr-auto -intro-x">
            <ol class="breadcrumb breadcrumb-light">
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <!-- END: Breadcrumb -->

        <!-- BEGIN: Account Menu -->
        <div class="w-8 h-8 intro-x dropdown">
            <div class="w-8 h-8 overflow-hidden scale-110 rounded-full shadow-lg dropdown-toggle image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="KTA Persatuan Purnawirawan Angkatan Laut" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }} ">
            </div>
            <div class="w-56 dropdown-menu">
                <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ auth()->user()->name }}</div>
                        <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ auth()->user()->email }}</div>
                    </li>
                    <li><hr class="dropdown-divider border-white/[0.08]"></li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Change Password
                        </a>
                    </li>
                    <li><hr class="dropdown-divider border-white/[0.08]"></li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5">
                            <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->
