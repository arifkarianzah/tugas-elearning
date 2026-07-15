<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-main leading-tight">
            {{ __('Edit Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden p-10 shadow-2xl sm:rounded-2xl">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-rose-500 text-white px-5 mb-4 font-medium shadow-md">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                
                <form method="POST" action="{{ route('admin.teachers.update', $teacher) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $teacher->user->name)" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="occupation" :value="__('Occupation')" />
                        <x-text-input id="occupation" class="block mt-1 w-full" type="text" name="occupation" :value="old('occupation', $teacher->user->occupation)" required autocomplete="occupation" />
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="avatar" :value="__('Avatar (Photo)')" />
                        <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" />
                        <p class="text-xs text-text-muted mt-2">Biarkan kosong jika tidak ingin mengubah foto profil.</p>
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="email" :value="__('Email Address')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $teacher->user->email)" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                        <p class="text-xs text-text-muted mt-2">Biarkan kosong jika tidak ingin mengubah password.</p>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex justify-end mt-8">
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-accent-amber to-orange-500 rounded-full font-bold text-sm text-white transition-all duration-300 ease-out hover:shadow-lg hover:-translate-y-1 hover:shadow-accent-amber/30 focus:outline-none focus:ring-2 focus:ring-accent-amber focus:ring-offset-2 focus:ring-offset-background">
                            Update Teacher
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
