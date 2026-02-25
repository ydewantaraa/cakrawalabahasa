   {{-- ================= MANAJEMEN HARGA LAYANAN ================= --}}
   @php
       // Ambil semua prices dari course
       $allPrices = $course->course_services->flatMap(fn($s) => $s->prices);
   @endphp
   <div class="space-y-6 mt-5">

       <div class="overflow-x-auto bg-white p-4 rounded shadow">
           <h2 class="text-xl font-semibold mb-4">Manajemen Harga Layanan</h2>

           @if ($allPrices->count())
               <table class="w-full border border-gray-200 text-sm">
                   <thead class="bg-gray-50">
                       <tr>
                           <th class="border px-3 py-2 text-left">Layanan</th>
                           <th class="border px-3 py-2 text-left">Sub Layanan</th>
                           <th class="border px-3 py-2 text-left">Media</th>
                           <th class="border px-3 py-2 text-left">Tipe Unit</th>
                           <th class="border px-3 py-2 text-left">Label Item</th>
                           <th class="border px-3 py-2 text-left">Harga</th>
                           <th class="border px-3 py-2 text-left">Label Paket</th>
                           <th class="border px-3 py-2 text-left">Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($course->course_services as $service)
                           @foreach ($service->prices as $price)
                               <tr>
                                   {{-- Service --}}
                                   <td class="border px-3 py-2">{{ $service->name }}</td>

                                   {{-- Sub Service --}}
                                   <td class="border px-3 py-2">
                                       {{ $price->subService ? $price->subService->name : '(Semua Sub Layanan)' }}
                                   </td>

                                   {{-- Media / Learning Type --}}
                                   <td class="border px-3 py-2">
                                       {{ $price->learning_type ?? '-' }}
                                   </td>

                                   {{-- Unit Type --}}
                                   <td class="border px-3 py-2 capitalize">
                                       @if ($price->unit_type === 'per_item')
                                           Per Item
                                       @elseif ($price->unit_type === 'fixed')
                                           Harga Tetap
                                       @endif
                                   </td>

                                   {{-- Label --}}
                                   <td class="border px-3 py-2">
                                       {{ $price->unit_type == 'per_item' ? $price->label_type : '-' }}
                                   </td>

                                   {{-- Price --}}
                                   <td class="border px-3 py-2 text-green-600 font-semibold">
                                       Rp {{ number_format($price->price) }}
                                   </td>

                                   {{-- Package Size --}}
                                   <td class="border px-3 py-2">
                                       {{ $price->unit_type == 'fixed' ? $price->package_size : '-' }}
                                   </td>

                                   {{-- Aksi --}}
                                   <td class="border px-3 py-2 flex gap-2">
                                       {{-- Edit --}}
                                       <button class="px-2 py-1 text-sm bg-blue-600 text-white rounded"
                                           @click="$store.modal.show('Edit Harga', $refs.editPrice{{ $price->id }}.innerHTML)">
                                           Edit
                                       </button>

                                       {{-- Delete --}}
                                       <form action="{{ route('prices.destroy', $price->id) }}" method="POST"
                                           @submit.prevent="$store.alert.confirm({ title: 'Hapus Harga?' }, ()=> $el.submit())">
                                           @csrf
                                           @method('DELETE')
                                           <button class="px-2 py-1 text-sm border rounded text-red-600">
                                               Hapus
                                           </button>
                                       </form>
                                   </td>
                               </tr>

                               {{-- Edit Modal Template --}}
                               <template x-ref="editPrice{{ $price->id }}">
                                   @include('admin.class-managements.prices.edit', ['price' => $price])
                               </template>
                           @endforeach
                       @endforeach
                   </tbody>
               </table>
           @else
               <p class="text-gray-500">Belum ada harga ditambahkan.</p>
           @endif
       </div>

   </div>
   {{-- ================= TEMPLATE MODAL ================= --}}
   @foreach ($course->course_services as $service)
       <template x-ref="editService{{ $service->id }}">
           @include('admin.class-managements.class-services.edit', ['service' => $service])
       </template>
   @endforeach
   @foreach ($course->course_services as $service)
       @foreach ($service->sub_course_services as $sub)
           <template x-ref="editSubService{{ $sub->id }}">
               @include('admin.class-managements.sub-class-services.edit', ['sub' => $sub])
           </template>
       @endforeach
   @endforeach
   @foreach ($course->course_services as $service)
       <template x-ref="createPrice{{ $service->id }}">
           @include('admin.class-managements.prices.create', ['service' => $service])
       </template>
       <template x-ref="createSubService{{ $service->id }}">
           @include('admin.class-managements.sub-class-services.create', ['service' => $service])
       </template>
   @endforeach
