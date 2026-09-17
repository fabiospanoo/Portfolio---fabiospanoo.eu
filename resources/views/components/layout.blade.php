@props(['title', 'navbarBrand' => null, 'metaDescription' => null, 'metaType' => 'website', 'metaImage' => null])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <x-seo :title="$title" :meta-description="$metaDescription" :meta-type="$metaType" :meta-image="$metaImage" />
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-navbar :navbarBrand="$navbarBrand"/>

        <div class="min-vh-100">
            {{$slot}}
        </div>

    <x-footer/>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 700,
        });

        document.addEventListener('click', function (e) {
            const link = e.target.closest('a[href^="copy:"]');
            if (!link) return;
            e.preventDefault();

            const value = link.getAttribute('href').replace('copy:', '');
            const original = link.textContent;

            const copied = () => {
                link.textContent = 'copied!';
                link.style.color = 'var(--color-c)';
                setTimeout(() => {
                    link.textContent = original;
                    link.style.color = '';
                }, 1500);
            };

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(value).then(copied).catch(() => {
                    window.prompt('Copy email:', value);
                });
            } else {
                window.prompt('Copy email:', value);
            }
        });
    </script>
</body>
</html>
