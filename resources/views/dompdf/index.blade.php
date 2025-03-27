<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DomPDF</title>
</head>
<body>
    <!-- Tutorial 1 -->
    <!-- <a href="{{ route('download.invoice', $item->id) }}">Unduh</a> -->

    <!-- Tutorial 2 -->
    <a href="{{ url('invoice/' . $item->id) }}" target="_blank">Lihat</a>
    <a href="{{ url('invoice/' . $item->id . '/download') }}">Unduh</a>
</body>
</html>