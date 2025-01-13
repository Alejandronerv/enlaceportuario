<html>
<body>
    <script type="application/json" id="json-data">
        {!! json_encode($jsonData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script>
        // Example: How to parse the JSON in JavaScript
        const jsonData = JSON.parse(document.getElementById('json-data').textContent);
        console.log(jsonData);
    </script>
</body>
</html>
