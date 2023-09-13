@extends('layouts.main')

@section('title', 'Edit bendahara')

@section('content')
    <form method="POST" action="{{ route('bendahara.update', $user) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="grid grid-cols-1 gap-4 w-2/6">
            <div class="mb-4">
                <span class="font-semibold">Nama lengkap</span>
                <input type="text" id="name" name="name" value="{{ $user->name }}"
                    class="input input-bordered w-full mt-2">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Email</span>
                <input type="text" id="email" name="email" value="{{ $user->email }}"
                    class="input input-bordered w-full mt-2">
            </div>
            <div class="mb-4">
                <span class="font-semibold">Password</span>
                <input type="password" id="password" name="password" placeholder="********"
                    class="input input-bordered w-full mt-2">
            </div>
            <div class="mb-4">
                <div class="font-semibold">Roles</div>
                <select class="select select-bordered w-full mt-2" id="roles" name="roles">
                    @foreach ($roles as $role)
                        @foreach ($user->roles as $role_user)
                            <option value="{{ $role->name }}" {{ $role->name == $role_user->name ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
                <label for="nisn">
                    <span class="label-text-alt text-error"></span>
                </label>
            </div>
            <div class="mb-4">
                <div class="font-semibold mb-3">Permissions</div>
                <div class="form-control gap-4">
                    @foreach ($permissions as $permission)
                        <label class="flex items-center gap-4 cursor-pointer">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $user->hasPermissionTo($permission->name) ? 'checked' : ''  }}
                                class="checkbox" />
                            <span class="label-text">{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('bendahara.index') }}" class="btn btn-error text-white" type="reset">
                Batal
            </a>
            <button class="btn btn-warning text-white" type="submit">
                Edit
            </button>
        </div>
    </form>
@endsection
