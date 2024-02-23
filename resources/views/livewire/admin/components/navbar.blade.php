<div>
    @if ($visibleNavbar)
        <div class="w-full navbar" x-transition.duration.500ms>
            @include('components.admin.hamburguer-menu')
            <div class="flex-none hidden lg:block menu-container">
                <ul class="menu menu-horizontal w-[99vw]">
                    @include('components.admin.navbar')
                </ul>
            </div>
        </div>
    @endif
</div>
