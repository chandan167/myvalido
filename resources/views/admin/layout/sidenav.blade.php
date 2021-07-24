<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    {!! genrate_sidenav() !!}
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

@section('customjs')
    <script>
        const sidenav = document.getElementById('accordionSidebar');
        if (sidenav) {
            const li = sidenav.getElementsByTagName('li');
            Array(...li).forEach(list => {
                const a = list.getElementsByTagName('a');
                Array(...a).forEach(link => {
                    if (link.href == window.location) {
                        link.classList.add('active');
                        list.classList.add('active')
                        const collapse = list.querySelector('.collapse');
                        if(collapse){
                            collapse.classList.add('show');
                            const lin = list.querySelector('a');
                           lin.classList.remove('collapsed')
                        }
                    }
                })
            })
        }
    </script>
@endsection
