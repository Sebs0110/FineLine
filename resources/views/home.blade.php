<head>
    @vite(['resources/js/app.js'])
    <title>Alguma coisa</title>
</head>
<div>
    <span id="teste">consegui</span>
</div>
<script type="module">
    $("#teste").css("background-color", "red");
</script>
