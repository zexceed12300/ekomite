@vite('resources/css/app.css')

<section class="flex flex-row gap-16 justify-center items-center w-screen h-screen bg-white">
    <div class="object-cover hidden md:block">
        <img class="bg-cover w-[660px] " src="assets/login-banner.jpg" alt="">
    </div>
    <div class="flex flex-col px-8 w-full md:w-1/5 items-center">
        <span class="font-bold italic mb-6 text-3xl">E-Komite</span>
        <span class="mb-6 text-2xl">Welcome back!</span>
        @if ($errors->get('password') || $errors->get('email'))
            <span class="mb-6 text-red-500">Username atau password salah!</span>
        @endif
        <form class="w-full" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-control w-full mb-3">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input required type="text" name="email" placeholder="mail@domain.com"
                    class="input input-bordered rounded-none focus:outline-none w-full" />
            </div>
            <div class="form-control w-full mb-4">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input required type="password" name="password" placeholder="********"
                    class="input input-bordered rounded-none focus:outline-none w-full" />
            </div>
            <div class="form-control mb-8">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" checked="checked" class="checkbox checkbox-primary" />
                    <span class="label-text">Remember me</span>
                </label>
            </div>
            <button class="btn btn-neutral text-white w-full">Login</button>
        </form>
    </div>
</section>
