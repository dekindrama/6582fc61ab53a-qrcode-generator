<?php

use App\Http\Controllers\QRCode\QRCodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('qrcode.index'));
});

Route::get('generate-qrcode', [QRCodeController::class, 'index'])->name('qrcode.index');
Route::get('generate-qrcode-result', [QRCodeController::class, 'generateQrCode'])->name('qrcode.result');
Route::get('generate-color-qrcode-result', [QRCodeController::class, 'generateColorQrCode'])->name('qrcode.color-result');
