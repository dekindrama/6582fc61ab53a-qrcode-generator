@extends('base-template')

@section('title')
    Generate Qr Code
@endsection

@section('body')
<div class="flex w-full h-screen items-center justify-center">
    <div class="w-full md:w-1/2 flex flex-col gap-5 bg-white rounded-xl shadow-lg px-5 py-5">
        <h1 class="text-3xl">Generate Qr Code</h1>
        <form action="{{route('qrcode.result')}}" method="get" id="form-generate-qrcode" class="flex flex-col gap-5">
            <div class="w-full flex flex-col">
                <label for="value" class="capitalize">Value of Qrcode</label>
                <input type="text" name="value" class="border-purple-500 border rounded px-5 py-3" required>
            </div>
            <div class="w-full flex flex-col">
                <label for="size" class="capitalize">size</label>
                <input type="number" min="100" name="size" value="100" class="border-purple-500 border rounded px-5 py-3" required>
            </div>
            <div class="w-full flex flex-col">
                <label for="color" class="capitalize">color</label>
                <input type="color" name="color"  value="#000000" class="border-purple-500 border rounded w-full p-2 h-10" required>
            </div>
            <div class="w-full flex flex-col">
                <label for="color" class="capitalize">background color</label>
                <input type="color" name="background_color"  value="#FFFFFF" class="border-purple-500 border rounded w-full p-2 h-10" required>
            </div>
            <x-button type="submit">generate</x-button>
        </form>
    </div>
</div>
@endsection
