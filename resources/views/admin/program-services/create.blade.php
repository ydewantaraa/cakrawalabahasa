@php
    $featuresOld = old(
        'features',
        collect($programService->feature_program_services ?? [])
            ->map(function ($f) {
                return [
                    'title' => $f['title'] ?? $f->title,
                    'description' => $f['description'] ?? $f->description,
                    'thumbnailPreview' => null,
                ];
            })
            ->toArray(),
    );

    $advantagesOld = old(
        'advantages',
        collect($programService->advantage_program_services ?? [])
            ->map(function ($a) {
                return [
                    'title' => $a['title'] ?? $a->title,
                    'description' => $a['description'] ?? $a->description,
                    'thumbnailPreview' => null,
                ];
            })
            ->toArray(),
    );
@endphp

<div x-data="{
    form: {
        name: @js(old('name', '')),
        description: @js(old('description', '')),
        hero_text: @js(old('hero_text', '')),
        hero_image: @js(old('hero_image', '')),
        image_service: @js(old('image_service', '')),
        show_in_dropdown: Boolean(@js(old('show_in_dropdown', true))),
        features: @js($featuresOld),
        advantages: @js($advantagesOld)
    },
    addFeature() {
        this.form.features.push({ title: '', description: '', thumbnailFile: null, thumbnailPreview: null });
    },
    removeFeature(index) {
        this.form.features.splice(index, 1);
    },
    handleFeatureThumbnailChange(event, feature) {
        const file = event.target.files[0];
        if (file) {
            feature.thumbnailFile = file;
            const reader = new FileReader();
            reader.onload = e => feature.thumbnailPreview = e.target.result;
            reader.readAsDataURL(file);
        } else {
            feature.thumbnailFile = null;
            feature.thumbnailPreview = null;
        }
    },
    addAdvantage() {
        this.form.advantages.push({ title: '', description: '', thumbnailFile: null, thumbnailPreview: null });
    },
    removeAdvantage(index) {
        this.form.advantages.splice(index, 1);
    },
    handleAdvantageThumbnailChange(event, advantage) {
        const file = event.target.files[0];
        if (file) {
            advantage.thumbnailFile = file;
            const reader = new FileReader();
            reader.onload = e => advantage.thumbnailPreview = e.target.result;
            reader.readAsDataURL(file);
        } else {
            advantage.thumbnailFile = null;
            advantage.thumbnailPreview = null;
        }
    },
    heroImagePreview: null,
    handleHeroChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => this.heroImagePreview = e.target.result;
            reader.readAsDataURL(file);
        } else {
            this.heroImagePreview = null;
        }
    },
    imageServicePreview: null,
    handleImageServiceChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => this.imageServicePreview = e.target.result;
            reader.readAsDataURL(file);
        } else {
            this.imageServicePreview = null;
        }
    }
}" class="bg-white rounded shadow-lg w-full max-w-3xl z-50 p-6">

    <form action="{{ route('program-services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium">Nama Program</label>
            <input type="text" name="name" x-model="form.name" placeholder="Contoh: CB For Kids"
                class="w-full border rounded px-3 py-2">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image Service --}}
        <div>
            <label class="block mb-1 font-medium">Image Service</label>
            <input type="file" name="image_service" class="w-full border rounded px-3 py-2"
                @change="handleImageServiceChange">

            {{-- Preview --}}
            <div x-show="imageServicePreview" class="mt-2">
                <img :src="imageServicePreview" class="w-32 h-32 object-cover border rounded">
            </div>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" rows="4" x-model="form.description" class="w-full border rounded px-3 py-2"></textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Hero Text --}}
        <div>
            <label class="block mb-1 font-medium">Hero Text</label>
            <input type="text" name="hero_text" x-model="form.hero_text" placeholder="Contoh: CB For Kids"
                class="w-full border rounded px-3 py-2">
            @error('hero_text')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Hero Image --}}
        <div>
            <label class="block mb-1 font-medium">Hero Image</label>
            <input type="file" name="hero_image" class="w-full border rounded px-3 py-2" @change="handleHeroChange">

            {{-- Preview --}}
            <div x-show="heroImagePreview" class="mt-2">
                <img :src="heroImagePreview" class="w-32 h-32 object-cover border rounded">
            </div>
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
                        <input type="file" :name="`features[${index}][thumbnail]`" class="w-full"
                            @change="handleFeatureThumbnailChange($event, feature)">
                    </div>

                    <div x-show="feature.thumbnailPreview" class="mt-2">
                        <img :src="feature.thumbnailPreview" class="w-32 h-32 object-cover border rounded">
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
                        <input type="file" :name="`advantages[${index}][thumbnail]`" class="w-full"
                            @change="handleAdvantageThumbnailChange($event, advantage)">
                    </div>

                    <div x-show="advantage.thumbnailPreview" class="mt-2">
                        <img :src="advantage.thumbnailPreview" class="w-32 h-32 object-cover border rounded">
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
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </div>
    </form>
</div>
