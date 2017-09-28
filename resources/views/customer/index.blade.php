<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Data Viewer</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container">
            <div id="app">
                <data-viewer source="/api/v1/customer" title="Customer Data"></data-viewer>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>