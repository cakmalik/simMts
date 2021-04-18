@role('super')
@php
$menus = DB::table('menus')
    ->where([
        'role_id' => 1,
        'is_active' => 1,
    ])
    ->get();
@endphp
@endrole

@role('admin')
@php
$menus = DB::table('menus')
    ->where([
        'role_id' => 2,
        'is_active' => 1,
    ])
    ->get();
@endphp
@endrole

@role('calonsiswa')
@php
$menus = DB::table('menus')
    ->where([
        'role_id' => 3,
        'is_active' => 1,
    ])
    ->get();
@endphp
@endrole

@role('siswa')
@php
$menus = DB::table('menus')
    ->where([
        'role_id' => 4,
        'is_active' => 1,
    ])
    ->get();
@endphp
@endrole

@role('alumni')
@php
$menus = DB::table('menus')
    ->where([
        'role_id' => 5,
        'is_active' => 1,
    ])
    ->get();
@endphp
@endrole

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">
        @foreach ($menus as $menu)
            <li class="nav-item">
                <a class="nav-link" href="{{ $menu->url }}">
                    <i class="{{ $menu->icon }} {{ $menu->icon_color }} mr-2"></i>
                    <p>
                        {{ $menu->name }}
                    </p>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
{{-- </div> --}}
