<!DOCTYPE html>
<html>
<head>
    <title>Operation Berth Graphic</title>
    <style>
        pre {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
    <h1>Operation Berth Graphic</h1>
    <div id="timeline-advanced"></div>
    <div id="timeline-grouped"></div>
    <script type="application/json" id="json-data">
        {!! json_encode($jsonData ?? [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
    <script src="{{ asset('js/berth-data.js') }}"></script>
</body>
</html>