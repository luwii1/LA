<x-layouts.default>
    <nav class="navbar bg-base-100 rounded-box shadow-base-300/20 shadow-sm sticky top-4 z-50 border-b-2">
        <div class="flex flex-1 items-center">
            <a class="link text-base-content link-neutral text-xl font-bold no-underline flex items-end" href="/">
                <span>عصفور</span>
                <span class="icon-[tabler--brand-twitter] size-8"></span>
            </a>
        </div>
        <div class="navbar-end flex items-center gap-4">
            @if(Auth::check())
                <div class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
                    <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <div class="avatar">
                            <div class="size-9.5 rounded-box">
                                <img src="/storage/{{ Auth::user()->avatar }}" alt="avatar 1" />
                            </div>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                        aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <span class="icon-[tabler--user]"></span>
                                الحساب الشخصي
                            </a>
                        </li>
                        <li class="dropdown-footer gap-2">
                            <form method="post" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" class="btn btn-error btn-soft btn-block">
                                    <span class="icon-[tabler--logout]"></span>
                                    تسجيل خروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}">
                    <button class="btn btn-text btn-square">
                        <span class="icon-[tabler--login] size-6"></span>
                    </button>
                </a>
            @endif
        </div>
    </nav>

    <div class=" mt-10 card px-16 py-8 max-w-84 self-center text-center"  >
        <div class="avatar mb-2">
            <div class="w-32 rounded-full mx-auto">
                <img src="/storage/{{ $user->avatar }}" alt="avatar" />
            </div>
        </div>
        <h2 class="text-3xl font-bold self-center">{{ $user->name }}</h2>
    </div>

</x-layouts.default>