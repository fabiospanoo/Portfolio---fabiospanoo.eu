@props([
    'title' => null,
    'metaDescription' => null,
    'metaType' => 'website',
    'metaImage' => null,
])

@php
    $siteName = config('app.name', 'Fabio Spanò');

    $pageTitle = $title ?? $siteName;

    $canonicalHost = config('site.canonical_host');

    $canonical = $canonicalHost
        ? config('site.app_scheme').'://'.$canonicalHost.request()->getRequestUri()
        : request()->url();

    $description = $metaDescription
        ?? 'Personal web developer portfolio. Agentic AI, Java and web development projects.';

    $image = $metaImage ? url($metaImage) : url('images/logo.png');
@endphp

<meta name="description" content="{{ $description }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $canonical }}">

<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:type" content="{{ $metaType }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $image }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">