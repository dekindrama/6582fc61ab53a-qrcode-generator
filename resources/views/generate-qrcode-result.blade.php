@extends('base-template')

@section('title')
    Generate Qr Code Result
@endsection

@section('body')
<div class="flex flex-col w-full h-screen items-center justify-center">
    <div class="w-full md:w-1/2 flex flex-col gap-5 bg-white rounded-xl shadow-lg px-5 py-5">
        <h1 class="text-3xl capitalize">result of qrcode</h1>
        <div class="flex flex-col md:flex-row justify-center items-center gap-5">
            <div class="h-[300px] w-[300px]">
                {!!$result!!}
            </div>
            <div class="">
                @if ($request->value)
                    <div>
                        <h2 class="capitalize font-bold">value</h2>
                        <p>{{$request->value}}</p>
                    </div>
                @endif
                @if ($request->size)
                    <div>
                        <h2 class="capitalize font-bold">size</h2>
                        <p>{{$request->size}} x {{$request->size}}</p>
                    </div>
                @endif
                @if ($request->color)
                    <div>
                        <h2 class="capitalize font-bold">color</h2>
                        <p>{{$request->color}}</p>
                    </div>
                @endif
                @if ($request->background_color)
                    <div>
                        <h2 class="capitalize font-bold">background color</h2>
                        <p>{{$request->background_color}}</p>
                    </div>
                @endif
            </div>
        </div>
        <x-button onclick="downloadSvg()">download</x-button>
    </div>
</div>
@endsection

@section('end-body')
<script>
    // styling svg qrcode result
    const svg = document.getElementsByTagName("svg")[0];
    svg.classList.add('w-full', 'h-full', 'object-cover');

    // perform action save file
    function saveFile(url, filename) {
        const a = document.createElement("a");
        a.href = url;
        a.download = filename || "file-name";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    //* perform action download svg
    function downloadSvg() {
        const resultSvg = `{{$result}}`;
        const blobSvg = new Blob([resultSvg], {type: "image/svg+xml"});
        const url = window.URL.createObjectURL(blobSvg);
        saveFile(url, "result-qrcode.svg");
        window.URL.revokeObjectURL(url);
    }
</script>
@endsection
