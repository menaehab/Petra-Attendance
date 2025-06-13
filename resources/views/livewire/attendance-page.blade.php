<div>
    <div class="flex items-center justify-center py-10">
        <div class="w-full max-w-xl p-8 bg-white shadow-2xl rounded-3xl">

            <div class="mb-12">
                <h2 class="text-2xl font-bold text-center text-indigo-600">{{ __('keywords.attendance') }}</h2>
            </div>
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3">
                    {{ session('failed') }}
                </div>
            @endif
            <!-- Form -->
            <form wire:submit.prevent="submit" class="flex flex-col space-y-4">
                <select wire:model.lazy="group_id" id="group_id" class="p-2 border rounded-xl">
                    <option value="">{{ __('keywords.group') }}</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
                @error('group_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                @if ($showSession)
                    <select wire:model.lazy="session_id" id="session_id" class="p-2 border rounded-xl">
                        <option value="">{{ __('keywords.session') }}</option>
                        @foreach ($sessions as $session)
                            <option value="{{ $session->id }}">
                                {{ \Carbon\Carbon::parse($session->date)->format('Y-m-d h:i A') }}
                            </option>
                        @endforeach
                    </select>
                    @error('session_id')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                @endif

                <input type="text" wire:model.lazy="code" placeholder="{{ __('keywords.code') }}"
                    class="flex-1 p-3 text-gray-700 placeholder-gray-400 bg-gray-100 border outline-none rounded-xl"
                    name="code" id="codeInput">
                @error('code')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="w-full p-2 text-white transition bg-indigo-500 rounded-xl hover:bg-indigo-400">
                    <span wire:loading.remove>{{ __('keywords.attendance') }}</span>
                    <span wire:loading>{{ __('keywords.attendance') }}</span>
                </button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let buffer = '';
            let lastKeyTime = Date.now();
            let timeout = null;

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    e.stopPropagation();
                    return;
                }

                const currentTime = Date.now();
                const timeDiff = currentTime - lastKeyTime;
                lastKeyTime = currentTime;

                if (e.key.length === 1) {
                    if (timeDiff < 50) {
                        buffer += e.key;
                    } else {
                        buffer = e.key;
                    }

                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        if (buffer.length >= 6) {
                            const code = buffer.trim();
                            const input = document.getElementById('codeInput');
                            input.value = code;

                            const component = Livewire.find(input.closest('[wire\\:id]')
                                .getAttribute('wire:id'));
                            component.set('code', code);

                            buffer = '';
                        }
                    }, 100);
                }
            });

            Livewire.on('open-whatsapp', ({
                link
            }) => {
                window.open(link, '_blank');
            });
        });
    </script>
</div>
