<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FIBA BASKETBALL</title>
    <link rel="stylesheet" href="{{ asset("assets/css/fiba-theme.css") }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f172a] text-white">
    <main class="container mx-auto px-4 py-8">
        @yield("content")
    </main>
</body>
</html>
