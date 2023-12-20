<?php

namespace App\Http\Controllers\QRCode;

use App\Http\Controllers\Controller;
use App\Http\Requests\QRCode\GenerateQrCodeRequest;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    function index() {
        return view('generate-qrcode');
    }
    public function generateQrCode(Request $request) {
        $result = QrCode::size(200)->format('svg')->generate($request->value);
        return view('generate-qrcode-result')->with(compact('result'));
    }

    function generateColorQrCode(Request $request) {
        $result = QrCode::size(200)
            ->backgroundColor(255,255,10)
            ->generate($request->value);
        return view('generate-qrcode-result')->with(compact('result'));
    }
}
