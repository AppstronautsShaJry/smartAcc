<!-- Delete Record -->
<x-modal.confirmation wire:model.defer="showDeleteModal">
    <x-slot name="title">Delete Entry</x-slot>
    <x-slot name="content">
        <div class="py-8 text-cool-gray-700 ">Are you sure you? This action is irreversible.</div>
    </x-slot>
    <x-slot name="footer">
        <div class=" flex gap-5 justify-end">
            <button wire:click.prevent="$set('showDeleteModal', false)" class="px-4 py-2 bg-gray-600 text-white font-lex rounded">Cancel</button>
            <button wire:click.prevent="trashData" x-on:click="setTimeout(() => window.location.reload(), 200)" class="px-4 py-2 bg-red-600 text-white font-lex rounded">Delete</button>
        </div>
    </x-slot>
</x-modal.confirmation>
