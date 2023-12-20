<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate Qr Code Result</title>
</head>
<body>
    <h1>result of qrcode</h1>
    {!!$result!!}
    <button onclick="downloadSvg()">download</button>

    <script>
        function saveFile(url, filename) {
            const a = document.createElement("a");
            a.href = url;
            a.download = filename || "file-name";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function downloadSvg() {
            const resultSvg = `{{$result}}`;
            const blobSvg = new Blob([resultSvg], {type: "image/svg+xml"});
            const url = window.URL.createObjectURL(blobSvg);
            saveFile(url, "result-qrcode.svg");
            window.URL.revokeObjectURL(url);
        }

    </script>
</body>
</html>
