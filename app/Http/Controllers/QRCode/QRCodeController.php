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
        $result = $this->_generateQrCode(
            $request->value,
            $request->size,
            $request->color,
            $request->background_color,
        );
        return view('generate-qrcode-result')->with(compact('result', 'request'));
    }

    private function _generateQrCode(string $value, string $size, string $color, string $backgroundColor) {
        //* covert hex color to rgb
        $rgbColor = $this->_convertHexToRgb($color);
        $rgbBackgroundColor = $this->_convertHexToRgb($backgroundColor);

        //* result
        $result = QrCode::size($size)
            ->color($rgbColor->r, $rgbColor->g, $rgbColor->b)
            ->backgroundColor($rgbBackgroundColor->r, $rgbBackgroundColor->g, $rgbBackgroundColor->b)
            ->generate($value);

        //* return result
        return $result;
    }

    private function _convertHexToRgb(string $hexCode) : object {
        list($r, $g, $b) = sscanf($hexCode, "#%02x%02x%02x");
        return (object)[
            'r'=> $r,
            'g'=> $g,
            'b'=> $b,
        ];
    }
}
