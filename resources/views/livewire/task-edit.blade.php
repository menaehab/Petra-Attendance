<div>
    <div class="flex items-center justify-center py-10">
        <div class="w-full max-w-xl p-8 bg-white shadow-2xl rounded-3xl">

            <div class="mb-12">
                <h2 class="text-2xl font-bold text-center text-indigo-600">{{ __('keywords.update_task') }}</h2>
            </div>

            @if (session()->has('success'))
                <div class="relative px-4 py-3 mb-3 text-green-700 bg-green-100 border border-green-400 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="update" class="flex flex-col space-y-4">
                <div>
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900">{{ __('keywords.title') }}</label>
                    <input type="text" wire:model.lazy="title" placeholder="{{ __('keywords.title') }}"
                        class="w-full p-3 text-gray-700 placeholder-gray-400 bg-gray-100 border outline-none rounded-xl"
                        id="title">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900">{{ __('keywords.description') }}</label>
                    <textarea wire:model.lazy="description" placeholder="{{ __('keywords.description') }}"
                        class="w-full p-3 text-gray-700 placeholder-gray-400 bg-gray-100 border outline-none rounded-xl" id="description"></textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full p-2 text-white transition bg-indigo-500 rounded-xl hover:bg-indigo-400">
                    <span wire:loading.remove>{{ __('keywords.update') }}</span>
                    <span wire:loading>{{ __('keywords.updating') }}</span>
                </button>
            </form>
        </div>
    </div>
</div>
