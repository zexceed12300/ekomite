<aside class="menu p-0 w-80 h-full bg-neutral text-white">

    <div class="grid content-between h-full">
        <div class="my-3 flex flex-col text-white font-thin gap-3">
            <div class="flex justify-start items-center px-6 h-[64px]">
                <h1 class="text-3xl font-bold italic">E-Komite</h1>
            </div>
            <span class="px-2">Main Menu</span>
            <a href="/"
                class="flex gap-6 px-4 py-3 text-base {{ request()->is('/') ? 'bg-primary' : '' }}">
                <span><i class="fa-solid fa-home w-4"></i></span>
                <h4>Dashboard</h1>
            </a>
            @can('manage pembayaran')
                <a href="/pembayaran"
                    class="flex gap-6 px-4 py-3 text-base {{ request()->is('pembayaran') ? 'bg-primary' : '' }}">
                    <span><i class="fa-solid fa-money-bill-1 w-4"></i></span>
                    <h4>Pembayaran</h1>
                </a>
                <a href="/laporan"
                    class="flex gap-6 px-4 py-3 text-base {{ request()->is('laporan') ? 'bg-primary' : '' }}">
                    <span><i class="fa-solid fa-receipt w-4"></i></span>
                    <h4>Laporan</h1>
                </a>
            @endcan
            @canany(['manage siswa', 'manage pembayaran'])
                <a href="/siswa"
                    class="flex gap-6 px-4 py-3 text-base {{ request()->is('siswa') ? 'bg-primary' : '' }}">
                    <span><i class="fa-solid fa-list w-4"></i></span>
                    <h4>Data Siswa</h1>
                </a>
            @endcanany
            @can('manage settings')
                <span class="px-2 mt-3">Settings</span>
                <a href="/angsuran"
                    class="flex gap-6 px-4 py-3 text-base {{ request()->is('angsuran') ? 'bg-primary' : '' }}">
                    <span><i class="fa-solid fa-money-bill-1 w-4"></i></span>
                    <h4>Angsuran</h1>
                </a>
                <a href="/tapel"
                    class="flex gap-6 px-4 py-3 text-base {{ request()->is('tapel') ? 'bg-primary' : '' }}">
                    <span><i class="fa-solid fa-calendar-days w-4"></i></span>
                    <h4>Tahun Pelajaran</h1>
                </a>
            @endcan
        </div>
        <div class="flex flex-col gap-3">
            @role('admin')
                <a href="/bendahara"
                    class="flex gap-6 hover:bg-primary px-4 py-3 text-base {{ request()->is('bendahara') ? 'bg-primary' : '' }}">
                    <span><i class="fa-solid fa-shield w-4"></i></span>
                    <h4>Kelola user</h1>
                </a>
            @endrole
            <div class="flex">
                <a href="/profile" class="w-4/5 flex gap-6 px-4 py-3 text-base">
                    <span><i class="fa-solid fa-user w-4"></i></span>
                    <h4>{{ Auth::user()->name }}</h1>
                </a>
                <form method="post" action="{{ route('logout') }}"
                    class="w-1/5 flex flex-col text-white font-thin gap-3">
                    @csrf
                    <button type="submit" class="flex justify-center gap-6 bg-primary px-4 py-3 text-base">
                        <span><i class="fa-solid fa-right-from-bracket w-4"></i></span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</aside>
