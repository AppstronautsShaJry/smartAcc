<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>
            <h2 class="text-xl font-bold mb-4 text-gray-700">Create User</h2>
            @if (session()->has('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif
            <form wire:submit.prevent="save" x-data="{ showPassword: false }">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" wire:model="name"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" wire:model="email"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" id="password" wire:model="password"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                        <button type="button" @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 px-3 text-gray-500 focus:outline-none">
                            <span x-show="!showPassword">👁️</span>
                            <span x-show="showPassword">❌</span>
                        </button>
                    </div>
                    @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" wire:model="password_confirmation"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"/>
                    @error('password_confirmation') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                        Save User
                    </button>
                </div>
            </form>
    </x-authentication-card>
</x-guest-layout>
