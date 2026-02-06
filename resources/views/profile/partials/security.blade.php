<div id="content-security" class="hidden">
    <form method="POST" action="{{ route('password.change') }}">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold text-sm text-gray-700 mb-1">Old Password</label>
            <input type="password" name="current_password" class="w-full rounded border-gray-300" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold text-sm text-gray-700 mb-1">New Password</label>
            <input type="password" name="password" class="w-full rounded border-gray-300" required>
        </div>

        <div class="mb-6">
            <label class="block font-semibold text-sm text-gray-700 mb-1">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="w-full rounded border-gray-300" required>
        </div>

        <div class="text-right">
            <button class="bg-navy_1 hover:bg-navy_2 text-white font-semibold py-2 px-4 rounded shadow">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
