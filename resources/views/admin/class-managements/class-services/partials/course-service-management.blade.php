   {{-- ================= MANAJEMEN LAYANAN ================= --}}
   @php
       $services = $course->course_services;
   @endphp
   <div class="space-y-4 sm:space-y-6 mt-4 sm:mt-5">
       <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-3">
           <h2 class="text-lg sm:text-xl font-semibold">
               Manajemen Layanan
           </h2>

           <button
               class="bg-navy_1 hover:bg-navy_2 text-white px-3 sm:px-4 py-2 rounded text-xs sm:text-sm w-full sm:w-auto"
               @click="$store.modal.show('Tambah Layanan {{ $course->name }}', $refs.createService{{ $course->id }}.innerHTML)">
               + Tambah Layanan
           </button>
       </div>

       <div class="overflow-x-auto bg-white p-3 sm:p-4 rounded shadow">
           @if ($services->count())
               <table class="w-full border border-gray-200 text-xs sm:text-sm">
                   <thead class="bg-gray-50">
                       <tr>
                           <th class="border px-2 sm:px-3 py-2 text-left">Layanan</th>
                           <th class="border px-2 sm:px-3 py-2 text-left">Sub Layanan</th>
                           <th class="border px-2 sm:px-3 py-2 text-left">Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($course->course_services as $service)
                           <tr class="bg-white align-top">
                               {{-- Service --}}
                               <td class="border px-2 sm:px-3 py-2 font-semibold">
                                   {{ $service->name }}
                               </td>

                               {{-- Sub Layanan --}}
                               <td class="border px-2 sm:px-3 py-2">
                                   @if ($service->sub_course_services->count())
                                       <div class="flex flex-wrap gap-1 sm:gap-2">
                                           @foreach ($service->sub_course_services as $sub)
                                               <button type="button"
                                                   class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-400 text-xs sm:text-sm transition-colors duration-200 cursor-pointer focus:outline-none"
                                                   title="Klik untuk edit {{ $sub->name }}"
                                                   @click="$store.modal.show('Edit Sub Layanan', $refs.editSubService{{ $sub->id }}.innerHTML)">
                                                   {{ $sub->name }}
                                               </button>
                                           @endforeach
                                       </div>
                                   @else
                                       <span class="text-gray-400 italic text-xs sm:text-sm">
                                           Belum ada sub layanan
                                       </span>
                                   @endif
                               </td>

                               {{-- Aksi --}}
                               <td class="border px-2 sm:px-3 py-2 flex flex-col gap-1 sm:gap-2">

                                   <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                       <button type="button"
                                           class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-xs sm:text-sm"
                                           title="Edit Layanan {{ $service->name }}"
                                           @click="$store.modal.show('Edit Service', $refs.editService{{ $service->id }}.innerHTML)">
                                           Edit Layanan
                                       </button>

                                       <form action="{{ route('course-service.destroy', $service->id) }}" method="POST"
                                           class="w-full"
                                           @submit.prevent="$store.alert.confirm({title:'Hapus Layanan?'}, ()=> $el.submit())">
                                           @csrf
                                           @method('DELETE')
                                           <button type="submit"
                                               class="w-full px-2 sm:px-3 py-1.5 sm:py-2 bg-red-500 text-white rounded hover:bg-red-600 text-xs sm:text-sm"
                                               title="Hapus Service {{ $service->name }}">
                                               Hapus Layanan
                                           </button>
                                       </form>
                                   </div>

                                   <button type="button"
                                       class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-xs sm:text-sm"
                                       title="Tambah Sub Layanan untuk {{ $service->name }}"
                                       @click="$store.modal.show('Tambah Sub Layanan {{ $service->name }}', $refs.createSubService{{ $service->id }}.innerHTML)">
                                       + Tambah Sub Layanan
                                   </button>

                                   <button type="button"
                                       class="px-2 py-1 bg-purple-600 text-white rounded hover:bg-purple-700 text-xs sm:text-sm"
                                       title="Tambah Harga untuk {{ $service->name }}"
                                       @click="$store.modal.show('Tambah Harga {{ $service->name }}', $refs.createPrice{{ $service->id }}.innerHTML)">
                                       + Tambah Harga
                                   </button>
                               </td>
                           </tr>
                       @endforeach
                   </tbody>
               </table>
           @else
               <p class="text-gray-500 text-sm">Belum ada layanan.</p>
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
   <template x-ref="createService{{ $course->id }}">
       @include('admin.class-managements.class-services.create', ['course' => $course])
   </template>
