{{-- <div x-data x-show="$store.modal.open" x-cloak class="fixed inset-0 z-50 flex items-end sm:items-center justify-center">

    {{-- Backdrop --}
    <div class="absolute inset-0 bg-black/50" @click="$store.modal.close()"></div>

    {{-- Modal --}
    <div
        class="relative bg-white w-full sm:max-w-xl
               h-[90vh]
               rounded-t-2xl sm:rounded-2xl
               flex flex-col">

        {{-- Header --}
        <div class="shrink-0 p-4 sm:p-6 border-b">
            <h2 class="text-lg sm:text-xl font-semibold" x-text="$store.modal.title"></h2>
        </div>

        {{-- Body --}
        <div class="flex-1 overflow-y-auto overscroll-contain
                   p-4 sm:p-6 touch-pan-y">
            <div x-html="$store.modal.content"></div>
        </div>
    </div>
</div> --}}

<div x-data x-show="$store.modal.open" x-cloak class="fixed inset-0 z-50 overflow-y-auto">

    {{-- Backdrop --}}
    <div class="fixed inset-0 bg-black/50" @click="$store.modal.close()"></div>

    {{-- Container --}}
    <div class="min-h-full flex items-end sm:items-center justify-center p-4">

        {{-- Modal --}}
        <div
            class="relative bg-white w-full sm:max-w-xl
                   max-h-[90dvh]
                   rounded-t-2xl sm:rounded-2xl
                   flex flex-col">

            {{-- Header --}}
            <div class="shrink-0 p-4 sm:p-6 border-b">
                <h2 class="text-lg sm:text-xl font-semibold" x-text="$store.modal.title"></h2>
            </div>

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto p-4 sm:p-6">
                <div x-html="$store.modal.content"></div>
            </div>

        </div>
    </div>
</div>
