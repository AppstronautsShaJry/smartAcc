@props([
    'id',
    'maxWidth' => '2xl',
    'attributes'=>null,
])

<form wire:submit.prevent="save">
    <div class="w-full h-auto">
        <x-modal wire:model.defer="showEditModal" maxWidth="{{{$maxWidth}}}" >
            <div class="">
                <div class="text-lg py-4 text-white bg-gradient-to-r from-blue-500 to-indigo-600 p-2 font-semibold rounded-t-md px-6">
                    {{ empty($id) ? 'New Entry' : 'Edit Entry' }}
                </div>
                <div class="mt-5 px-6 ">
                    {{$slot}}
                </div>
                <div class="mb-1">&nbsp;</div>
            </div>
            <div class="sm:px-6 px-3 py-3 bg-gray-100 text-right">
                <div class="w-full flex justify-between gap-3">
                    <div class="py-2">
                        <label for="active_id" class="inline-flex relative items-center cursor-pointer">
                            <input type="checkbox" id="active_id" class="sr-only peer"
                                   wire:model="is_active">
                            <div
                                class="w-10 h-5 bg-gray-200 rounded-full peer peer-focus:ring-2
                                        peer-focus:ring-blue-300
                                         peer-checked:after:translate-x-full peer-checked:after:border-white
                                         after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300
                                         after:border after:rounded-full after:h-4 after:w-4 after:transition-all
                                         peer-checked:bg-blue-600"></div>
                            <span class="ml-3 sm:text-sm text-xs font-medium text-gray-900">Active</span>
                        </label>
                    </div>
                    <div class="flex gap-3">
                        <x-button.cancel
                            wire:click.prevent="$set('showEditModal', false)"
                            x-on:click="setTimeout(() => window.location.reload(), 200)"
                            {{$attributes}}>Cancel</x-button.cancel>
                        <x-button.save
                            wire:click.prevent="getSave"
                            x-on:click="setTimeout(() => window.location.reload(), 200)"
                        >Save</x-button.save>
                    </div>
                </div>
            </div>
        </x-modal>
    </div>
</form>
