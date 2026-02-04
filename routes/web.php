<?php

use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Web\Auth\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

// Email verification
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [AuthController::class, 'verifyNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'resendVerification'])
        ->middleware('throttle:6,1')->name('verification.send');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/payment', function (Request $request) {
    \Midtrans\Config::$serverKey    = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = config('midtrans.is_production');
    \Midtrans\Config::$isSanitized  = true;
    \Midtrans\Config::$is3ds        = true;

    // Ambil string harga dari request (misalnya: "Rp2.750.010")
    $rawTotal = $request->total;

    // Hilangkan Rp, spasi, dan koma
    $clean = str_replace(['Rp', ' ', ','], '', $rawTotal);
    // Hilangkan titik (pemisah ribuan)
    $clean = str_replace('.', '', $clean);

    // Konversi ke integer
    $total = (int) $clean; // hasil: 2750010

    // Pastikan layanan ikut terkirim dari form checkout
    $layananId   = $request->layanan_id ?? 'program-' . uniqid();
    $layananName = $request->layanan ?? 'Program Belajar';

    $params = [
        'transaction_details' => [
            'order_id'     => uniqid(),
            'gross_amount' => $total,
        ],
        'customer_details' => [
            'first_name' => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ],
        'item_details' => [[
            'id'       => $layananId,     // isi sesuai ID layanan
            'price'    => $total,         // harga sudah di-convert ke integer
            'quantity' => 1,
            'name'     => $layananName,   // nama layanan sesuai yang dipilih
        ]],
    ];

    $snapToken = \Midtrans\Snap::getSnapToken($params);
    return response()->json(['snapToken' => $snapToken]);
});

Route::get('/', function () {
    return view('landing.index');
});

// Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect'])->name('google.redirect');
// Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('google.callback');

Route::get('/cb for you', function () {
    return view('landing.cb for you');
});

Route::get('/tentang kami', function () {
    return view('landing.about us');
});

Route::get('/berita', function () {
    return view('landing.berita');
});

Route::get('/cb for kids', function () {
    return view('landing.cb for kids');
});

Route::get('/cb extras', function () {
    return view('landing.cb extras');
});

Route::get('/partnership', function () {
    return view('landing.partnership');
});

Route::get('/membership', function () {
    return view('landing.membership');
});

Route::get('/beasiswa', function () {
    return view('landing.beasiswa');
});

Route::get('/karir', function () {
    return view('landing.karir');
});

Route::get('/checkout', function () {
    return view('landing.checkout');
})->name('checkout');

Route::get('/layanan/{id}', [LayananController::class, 'detail'])->name('layanan.detail');

Route::get('/marketplace pengajar', function () {
    return view('landing.marketplace pengajar');
});

Route::get('/video belajar modul', function () {
    return view('landing.video belajar modul');
});

Route::get('/ujian penilaian', function () {
    return view('landing.ujian penilaian');
});

Route::get('/alih bahasa grammar', function () {
    return view('landing.alih bahasa grammar');
});

Route::get('/komunitas permainan', function () {
    return view('landing.komunitas permainan');
});

Route::get('/semua produk', function () {
    return view('landing.semua produk');
});

Route::get('/privacy_policy', function () {
    return view('privacy_policy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {

    // Dashboard
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Course management (bisa untuk listing kursus, detail, dll)
    Route::resource('/courses', CourseController::class);

    // Cart management
    Route::post('/cart/add/{course}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Checkout Midtrans
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');

    // Profile management (default dari breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
