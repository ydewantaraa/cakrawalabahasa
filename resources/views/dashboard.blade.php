@section('title', 'Dashboard')

@section('content')
    <div class="flex flex-col md:flex-row p-6 space-y-6 md:space-y-0 md:space-x-6" x-data="{ activeTab: 'courses' }">
        <!-- Sidebar -->
        <div class="w-full md:w-1/5 bg-white rounded-3xl shadow-lg p-6">
            <nav class="space-y-4">
                <!-- tombol sidebar -->
            </nav>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-4/5 space-y-6">

            <!-- My Courses -->
            <section x-show="activeTab === 'courses'" x-cloak>
                ...
            </section>

            <!-- History -->
            <section x-show="activeTab === 'history'" x-cloak>
                ...
            </section>

            <!-- Favourite -->
            <section x-show="activeTab === 'favourite'" x-cloak>
                ...
            </section>

        </div>
    </div>
@endsection
