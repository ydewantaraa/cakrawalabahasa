@php
    $featuresOld = old(
        'features',
        $programService->feature_program_services
            ->map(
                fn($f) => [
                    'title' => $f->title,
                    'description' => $f->description,
                    'thumbnailPreview' => $f->thumbnail,
                    'thumbnailFile' => null,
                ],
            )
            ->toArray(),
    );

    $advantagesOld = old(
        'advantages',
        $programService->advantage_program_services
            ->map(
                fn($a) => [
                    'title' => $a->title,
                    'description' => $a->description,
                    'thumbnailPreview' => $a->thumbnail,
                    'thumbnailFile' => null,
                ],
            )
            ->toArray(),
    );
@endphp

<div x-data="{
    form: {
        name: @js(old('name', $programService->name)),
        description: @js(old('description', $programService->description)),
        show_in_dropdown: Boolean(@js(old('show_in_dropdown', $programService->show_in_dropdown))),
        features: @js($featuresOld),
        advantages: @js($advantagesOld)
    },
    addFeature() {
        this.form.features.push({ title: '', description: '', thumbnailPreview: null, thumbnailFile: null });
    },
    removeFeature(index) {
        this.form.features.splice(index, 1);
    },
    addAdvantage() {
        this.form.advantages.push({ title: '', description: '', thumbnailPreview: null, thumbnailFile: null });
    },
    removeAdvantage(index) {
        this.form.advantages.splice(index, 1);
    }
}" class="bg-white rounded shadow-lg w-full max-w-3xl z-50 p-6">

    <h2 class="text-xl font-semibold mb-4">Edit Program Service</h2>

    <form action="{{ route('program-services.update', $programService) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium">Nama Program</label>
            <input type="text" name="name" x-model="form.name" placeholder="Contoh: CB For Kids"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" rows="4" x-model="form.description" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        {{-- Dropdown --}}
        <input type="hidden" name="show_in_dropdown" value="0">
        <div class="flex items-center gap-2">
            <input type="checkbox" name="show_in_dropdown" value="1" x-model="form.show_in_dropdown">
            <label>Tampilkan di dropdown</label>
        </div>

        {{-- Fitur Program --}}
        <div class="space-y-3">
            <h3 class="text-lg font-semibold mb-2">Fitur Program</h3>
            <template x-for="(feature, index) in form.features" :key="index">
                <div class="border p-3 rounded space-y-2">
                    <div class="flex justify-between items-center">
                        <h4 class="font-medium">Fitur <span x-text="index + 1"></span></h4>
                        <button type="button" @click="removeFeature(index)" class="text-red-500 text-sm">Hapus</button>
                    </div>

                    <div>
                        <label class="block mb-1">Nama Fitur</label>
                        <input type="text" :name="`features[${index}][title]`" x-model="feature.title"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block mb-1">Deskripsi Fitur</label>
                        <textarea :name="`features[${index}][description]`" rows="2" x-model="feature.description"
                            class="w-full border rounded px-3 py-2"></textarea>
                    </div>

                    <div>
                        <label class="block mb-1">Thumbnail (opsional)</label>
                        <template x-if="feature.thumbnailPreview">
                            <img :src="feature.thumbnailPreview" class="w-32 h-32 object-cover mb-1 rounded border">
                        </template>
                        <input type="file" :name="`features[${index}][thumbnail]`"
                            @change="
                                const file = $event.target.files[0];
                                if(file){
                                    feature.thumbnailFile = file;
                                    const reader = new FileReader();
                                    reader.onload = e => feature.thumbnailPreview = e.target.result;
                                    reader.readAsDataURL(file);
                                }
                            "
                            class="w-full">
                    </div>
                </div>
            </template>

            <div class="mt-2">
                <button type="button" @click="addFeature()"
                    class="px-3 py-1 bg-green-500 text-white rounded text-sm">Tambah Fitur</button>
            </div>
        </div>

        {{-- Advantage Program --}}
        <div class="space-y-3 mt-4">
            <h3 class="text-lg font-semibold mb-2">Keunggulan Program</h3>
            <template x-for="(advantage, index) in form.advantages" :key="index">
                <div class="border p-3 rounded space-y-2">
                    <div class="flex justify-between items-center">
                        <h4 class="font-medium">Keunggulan <span x-text="index + 1"></span></h4>
                        <button type="button" @click="removeAdvantage(index)"
                            class="text-red-500 text-sm">Hapus</button>
                    </div>

                    <div>
                        <label class="block mb-1">Nama Keunggulan</label>
                        <input type="text" :name="`advantages[${index}][title]`" x-model="advantage.title"
                            class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block mb-1">Deskripsi Keunggulan</label>
                        <textarea :name="`advantages[${index}][description]`" rows="2" x-model="advantage.description"
                            class="w-full border rounded px-3 py-2"></textarea>
                    </div>

                    <div>
                        <label class="block mb-1">Thumbnail (opsional)</label>
                        <template x-if="advantage.thumbnailPreview">
                            <img :src="advantage.thumbnailPreview" class="w-32 h-32 object-cover mb-1 rounded border">
                        </template>
                        <input type="file" :name="`advantages[${index}][thumbnail]`"
                            @change="
                                const file = $event.target.files[0];
                                if(file){
                                    advantage.thumbnailFile = file;
                                    const reader = new FileReader();
                                    reader.onload = e => advantage.thumbnailPreview = e.target.result;
                                    reader.readAsDataURL(file);
                                }
                            "
                            class="w-full">
                    </div>
                </div>
            </template>

            <div class="mt-2">
                <button type="button" @click="addAdvantage()"
                    class="px-3 py-1 bg-purple-500 text-white rounded text-sm">Tambah Keunggulan</button>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end gap-2 mt-4">
            <button type="button" @click="$store.modal.close()"
                class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 transition">Batal</button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </div>
    </form>
</div>
