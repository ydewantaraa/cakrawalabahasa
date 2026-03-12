@php
    $featuresOld = old(
        'features',
        $programService->feature_program_services
            ->map(
                fn($f) => [
                    'title' => $f->title,
                    'description' => $f->description,
                    'thumbnailPreview' => $f->thumbnail ? $f->thumbnail : null,
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
                    'thumbnailPreview' => $a->thumbnail ? $a->thumbnail : null,
                    'iconPreview' => $a->icon ? $a->icon : null,
                    'thumbnailFile' => null,
                    'iconFile' => null,
                ],
            )
            ->toArray(),
    );
@endphp

<div x-data="{
    form: {
        name: @js(old('name', $programService->name)),
        description: @js(old('description', $programService->description)),
        hero_text: @js(old('hero_text', $programService->hero_text)),
        subhero_text: @js(old('subhero_text', $programService->subhero_text)),
        heroImagePreview: @js($programService->hero_image),
        serviceImagePreview: @js($programService->image_service),
        show_in_dropdown: Boolean(@js(old('show_in_dropdown', $programService->show_in_dropdown))),
        show_related_program: @js(old('show_related_program', $programService->relatedPrograms->isNotEmpty() ? 1 : 0)),
        related_program_id: @js(old('related_program_id', optional($programService->relatedPrograms->first())->id)),
        features: @js($featuresOld),
        advantages: @js($advantagesOld)
    },
    addFeature() { this.form.features.push({ title: '', description: '', thumbnailPreview: null, thumbnailFile: null }); },
    removeFeature(index) { this.form.features.splice(index, 1); },
    addAdvantage() { this.form.advantages.push({ title: '', description: '', thumbnailPreview: null, thumbnailFile: null, iconPreview: null, iconFile: null }); },
    removeAdvantage(index) { this.form.advantages.splice(index, 1); },
    handleHeroImageChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => this.form.heroImagePreview = e.target.result;
            reader.readAsDataURL(file);
        } else { this.form.heroImagePreview = @js($programService->hero_image); }
    },
    handleServiceImageChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => this.form.serviceImagePreview = e.target.result;
            reader.readAsDataURL(file);
        } else { this.form.serviceImagePreview = @js($programService->service_image); }
    },
}" class="bg-white rounded shadow-lg w-full max-w-3xl z-50 p-4 sm:p-6">

    <h2 class="text-xl font-semibold mb-4">Edit Layanan Program</h2>

    <form action="{{ route('program-services.update', $programService) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium">Nama Program</label>
            <input type="text" name="name" x-model="form.name" placeholder="Contoh: CB For Kids"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        {{-- Dropdown --}}
        <div class="flex items-center gap-2 text-sm sm:text-base">
            <input type="checkbox" name="show_in_dropdown" value="1" x-model="form.show_in_dropdown">
            <label>Tampilkan di dropdown</label>
        </div>

        {{-- Service Image --}}
        <div class="mb-4">
            <label class="block font-semibold mb-2">Service Image</label>
            <template x-if="form.serviceImagePreview">
                <img :src="form.serviceImagePreview"
                    class="w-24 h-24 sm:w-40 sm:h-40 object-cover rounded-lg mb-2 border">
            </template>
            <input type="file" name="image_service" accept="image/*" @change="handleServiceImageChange"
                class="w-full border rounded-lg p-2 text-sm sm:text-base">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" rows="4" x-model="form.description"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base"></textarea>
        </div>

        {{-- Hero Text --}}
        <div>
            <label class="block mb-1 font-medium">Hero Text</label>
            <input type="text" name="hero_text" x-model="form.hero_text"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        {{-- Sub Hero Text --}}
        <div>
            <label class="block mb-1 font-medium">Sub Hero Text</label>
            <input type="text" name="subhero_text" x-model="form.subhero_text"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        {{-- Hero Image --}}
        <div>
            <label class="block mb-1 font-medium">Hero Image</label>
            <input type="file" name="hero_image" class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                @change="handleHeroImageChange">
            <div x-show="form.heroImagePreview" class="mt-2">
                <img :src="form.heroImagePreview" class="w-24 h-24 sm:w-32 sm:h-32 object-cover border rounded">
            </div>
        </div>

        {{-- Related Program --}}
        <div class="mt-4 space-y-2 text-sm sm:text-base">
            <label class="block font-medium">Apakah akan menampilkan layanan program lain?</label>
            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2">
                    <input type="radio" name="show_related_program" value="1"
                        x-model="form.show_related_program">
                    Ya
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="show_related_program" value="0" x-model="form.show_related_program"
                        @change="form.related_program_id=''">
                    Tidak
                </label>
            </div>

            <div class="mt-2" x-show="form.show_related_program == 1" x-transition>
                <label class="block mb-1">Pilih Layanan Program Lain</label>
                <select name="related_program_id" x-model="form.related_program_id"
                    class="w-full border rounded px-3 py-2 text-sm sm:text-base">
                    <option value="">-- Pilih Program --</option>
                    @foreach ($allProgramServices as $ps)
                        @if ($ps->id !== $programService->id)
                            <option value="{{ $ps->id }}">{{ $ps->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Fitur Program --}}
        <div class="space-y-3">
            <h3 class="text-lg font-semibold mb-2">Fitur Program</h3>
            <template x-for="(feature, index) in form.features" :key="index">
                <div class="border p-3 rounded space-y-2 text-sm sm:text-base">
                    <div class="flex justify-between items-center">
                        <h4 class="font-medium">Fitur <span x-text="index + 1"></span></h4>
                        <button type="button" @click="removeFeature(index)"
                            class="px-2 py-1 text-red-500 rounded border border-red-500 hover:bg-red-50 whitespace-nowrap text-xs sm:text-sm">
                            Hapus
                        </button>
                    </div>
                    <input type="text" :name="`features[${index}][title]`" x-model="feature.title"
                        class="w-full border rounded px-3 py-2">
                    <textarea :name="`features[${index}][description]`" rows="2" x-model="feature.description"
                        class="w-full border rounded px-3 py-2"></textarea>
                    <div>
                        <template x-if="feature.thumbnailPreview">
                            <img :src="feature.thumbnailPreview"
                                class="w-24 h-24 sm:w-32 sm:h-32 object-cover mb-1 rounded border">
                        </template>
                        <input type="file" :name="`features[${index}][thumbnail]`"
                            class="w-full text-sm sm:text-base"
                            @change="
                                const file = $event.target.files[0];
                                if(file){
                                    feature.thumbnailFile = file;
                                    const reader = new FileReader();
                                    reader.onload = e => feature.thumbnailPreview = e.target.result;
                                    reader.readAsDataURL(file);
                                }
                            ">
                    </div>
                </div>
            </template>
            <div class="mt-2">
                <button type="button" @click="addFeature()"
                    class="px-3 py-1 bg-green-500 text-white rounded text-sm sm:text-base whitespace-nowrap">
                    Tambah Fitur
                </button>
            </div>
        </div>

        {{-- Keunggulan Program --}}
        <div class="space-y-3 mt-4">
            <h3 class="text-lg font-semibold mb-2">Keunggulan Program</h3>
            <template x-for="(advantage, index) in form.advantages" :key="index">
                <div class="border p-3 rounded space-y-2 text-sm sm:text-base">
                    <div class="flex justify-between items-center">
                        <h4 class="font-medium">Keunggulan <span x-text="index + 1"></span></h4>
                        <button type="button" @click="removeAdvantage(index)"
                            class="px-2 py-1 text-red-500 rounded border border-red-500 hover:bg-red-50 whitespace-nowrap text-xs sm:text-sm">
                            Hapus
                        </button>
                    </div>
                    <input type="text" :name="`advantages[${index}][title]`" x-model="advantage.title"
                        class="w-full border rounded px-3 py-2">
                    <textarea :name="`advantages[${index}][description]`" rows="2" x-model="advantage.description"
                        class="w-full border rounded px-3 py-2"></textarea>

                    <div>
                        <label class="block mb-1 text-sm sm:text-base">Icon (opsional)</label>
                        <template x-if="advantage.iconPreview">
                            <img :src="advantage.iconPreview"
                                class="w-24 h-24 sm:w-32 sm:h-32 object-cover mb-1 rounded border">
                        </template>
                        <input type="file" :name="`advantages[${index}][icon]`" class="w-full"
                            @change="
                            const file = $event.target.files[0];
                            if(file){advantage.iconFile = file; const reader = new FileReader(); reader.onload=e=>advantage.iconPreview=e.target.result; reader.readAsDataURL(file);}
                        ">
                    </div>

                    <div>
                        <label class="block mb-1 text-sm sm:text-base">Thumbnail (opsional)</label>
                        <template x-if="advantage.thumbnailPreview">
                            <img :src="advantage.thumbnailPreview"
                                class="w-24 h-24 sm:w-32 sm:h-32 object-cover mb-1 rounded border">
                        </template>
                        <input type="file" :name="`advantages[${index}][thumbnail]`" class="w-full"
                            @change="
                            const file = $event.target.files[0];
                            if(file){advantage.thumbnailFile = file; const reader = new FileReader(); reader.onload=e=>advantage.thumbnailPreview=e.target.result; reader.readAsDataURL(file);}
                        ">
                    </div>
                </div>
            </template>
            <div class="mt-2">
                <button type="button" @click="addAdvantage()"
                    class="px-3 py-1 bg-purple-500 text-white rounded text-sm sm:text-base whitespace-nowrap">
                    Tambah Keunggulan
                </button>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end gap-2 pt-3 sm:pt-4">
            <button type="button" @click="$store.modal.close()"
                class="px-3 sm:px-4 py-2 border rounded text-sm sm:text-base hover:bg-gray-100">
                Batal
            </button>

            <button type="submit"
                class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded text-sm sm:text-base hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
