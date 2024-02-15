<div class="navbar bg-base-100 p-4 h-24">
    <div class="navbar-start">
        <a href="{{ route('admin.index') }}">
            <h1 class="text-3xl font-light tracking-[0.3rem]">wire:cotton</h1>
        </a>
    </div>
    <div class="navbar-center gap-6">
        <div class="dropdown dropdown-hover h-12 mt-6 flex justify-center">
            <a href="{{ route('admin.products.index') }}" tabindex="0" class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">produtos</a>
            {{-- <ul tabindex="0" class="dropdown-content z-[1] p-3 shadow bg-base-100 rounded-box w-52 mt-9">
                <li class="flex flex-col">
                    <a href="" class="btn btn-sm btn-ghost">ver produtos</a>
                </li>
            </ul> --}}
        </div>
        <div class="dropdown dropdown-hover h-12 mt-6 flex justify-center">
            <a href="{{ route('admin.categories.index') }}" tabindex="0" class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">categorias</a>
            {{-- <ul tabindex="0" class="dropdown-content z-[1] p-3 shadow bg-base-100 rounded-box w-52 mt-9">
                <li class="flex flex-col">
                    <a href="" class="btn btn-sm btn-ghost">ver categorias</a>
                </li>
            </ul> --}}
        </div>
        <div class="dropdown dropdown-hover h-12 mt-6 flex justify-center">
            <a href="{{ route('admin.subcategories.index') }}" tabindex="0" class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">subcategorias</a>
            {{-- <ul tabindex="0" class="dropdown-content z-[1] p-3 shadow bg-base-100 rounded-box w-52 mt-9">
                <li class="flex flex-col">
                    <a href="" class="btn btn-sm btn-ghost">ver subcategorias</a>
                </li>
            </ul> --}}
        </div>
        <div class="dropdown dropdown-hover h-12 mt-6 flex justify-center">
            <a tabindex="0" class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">pedidos</a>
            {{-- <ul tabindex="0" class="dropdown-content z-[1] p-3 shadow bg-base-100 rounded-box w-52 mt-9">
                <li class="flex flex-col">
                    <a href="" class="btn btn-sm btn-ghost">ver pedidos</a>
                </li>
            </ul> --}}
        </div>
        <div class="dropdown dropdown-hover h-12 mt-6 flex justify-center">
            <a tabindex="0" class="text-lg tracking-[0.2rem] hover:font-semibold cursor-pointer">clientes</a>
            {{-- <ul tabindex="0" class="dropdown-content z-[1] p-3 shadow bg-base-100 rounded-box w-52 mt-9">
                <li class="flex flex-col">
                    <a href="" class="btn btn-sm btn-ghost">ver clientes</a>
                </li>
            </ul> --}}
        </div>
    </div>
    <div class="navbar-end mr-4 gap-2">
        <button class="btn btn-ghost btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
        <div class="mr-3 flex justify-center items-center">
            <div class="dropdown dropdown-hover h-full justify-center flex">
                <button tabindex="0" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span class="badge badge-xs badge-primary indicator-item"></span>
                    </div>
                </button>
                <ul tabindex="0" class="dropdown-content z-[1] p-3 shadow bg-base-100 rounded-box w-28 mt-12">
                    <li class="flex flex-col">
                        <a href="" class="btn btn-sm btn-ghost">Nenhuma notificação</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mr-3 flex justify-center items-center">
            <div class="dropdown dropdown-hover h-full justify-center flex">
                <button tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component"
                            src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </button>
                <ul tabindex="0" class="dropdown-content z-[1] p-3 shadow bg-base-100 rounded-box w-28 mt-12">
                    <li class="flex flex-col">
                        <a href="" class="btn btn-sm btn-ghost">Perfil</a>
                        <a href="" class="btn btn-sm btn-ghost">Ajustes</a>
                        <a href="" class="btn btn-sm btn-ghost">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
