<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-evenly ">
    <x-partials.card1 party="Customer" :link="'customers.index'" :count="$customers->count()" />
    <x-partials.card1 party="Supplier" :link="'suppliers.index'" :count="$suppliers->count()" />
    </div>

    <div class="w-full fixed top-0 right-0 h-16 flex justify-end items-center px-20 bg-gray-50 ">
    <div x-data="{
        showToast: false,
        currentTime: '',
        showBackupMessage() {
            this.currentTime = new Date().toLocaleString(); // Get current date and time
            this.showToast = true;
            setTimeout(() => this.showToast = false, 3000); // Auto-hide after 3 seconds
        }
    }"
         class="relative"
    >
        <!-- Backup Button -->
        <button
            @click="showBackupMessage()"
            class="px-6 py-3 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300 transition duration-300"
        >
            Backup
        </button>

        <!-- Toaster Notification -->
        <div
            x-show="showToast"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-4 opacity-0 scale-90"
            x-transition:enter-end="translate-y-0 opacity-100 scale-100"
            x-transition:leave="transform ease-in duration-300 transition"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed top-4 right-4 bg-gradient-to-r from-green-500 to-blue-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2"
            style="display: none;"
        >
            <!-- Success Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <!-- Message -->
            <span class="font-semibold">Data Backed Up Successfully</span>
            <span class="text-sm text-gray-300">at <span x-text="currentTime"></span></span>
        </div>

    </div>
    </div>
    <!-- https://play.tailwindcss.com/eCfibrSI2X -->
</x-app-layout>
