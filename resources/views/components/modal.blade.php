{{-- <div x-data x-show="$store.modal.open" x-cloak class="fixed inset-0 z-50 flex items-end sm:items-center justify-center">
    <div class="fixed inset-0 bg-black/50" @click="$store.modal.close()"></div>
    <div
        class="
            relative bg-white w-full
            sm:max-w-xl sm:rounded-lg
            h-[90vh] sm:h-auto
            rounded-t-2xl sm:rounded-2xl
            overflow-y-auto
            p-4 sm:p-6
        ">
        <h2 class="text-lg sm:text-xl font-semibold mb-4" x-text="$store.modal.title"></h2>

        <div x-html="$store.modal.content"></div>
    </div>
</div> --}}

<div x-data x-show="$store.modal.open" x-cloak class="fixed inset-0 z-50 flex items-end sm:items-center justify-center">
    {{-- Backdrop --}}
    <div class="fixed inset-0 bg-black/50" @click="$store.modal.close()"></div>

    {{-- Modal box --}}
    <div
        class="relative bg-white w-full sm:max-w-xl sm:rounded-lg
                h-[90vh] sm:h-auto rounded-t-2xl sm:rounded-2xl
                overflow-y-auto p-4 sm:p-6">
        <h2 class="text-lg sm:text-xl font-semibold mb-4" x-text="$store.modal.title"></h2>
        <div x-html="$store.modal.content"></div>
    </div>
</div>
