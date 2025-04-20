@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-16 px-4 text-gray-800 dark:text-gray-200">
    <h1 class="text-3xl font-bold mb-6 text-cyan-600">Privacy & Cookie Policy</h1>

    <h2 class="text-xl font-semibold mt-6 mb-2">1. Introduction</h2>
    <p>
        Your privacy is important to us. This website respects your data and only uses essential and optional cookies to improve the user experience.
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">2. What data we collect</h2>
    <ul class="list-disc pl-6 space-y-1">
        <li>Anonymous analytics data (via tools like Google Analytics, if active)</li>
        <li>Form submissions (contact form data)</li>
        <li>Basic technical information (browser, OS, device type)</li>
    </ul>

    <h2 class="text-xl font-semibold mt-6 mb-2">3. Cookies we use</h2>
    <ul class="list-disc pl-6 space-y-1">
        <li><strong>Essential cookies</strong>: For core site functionality</li>
        <li><strong>Analytics cookies</strong>: Help us understand how you use the site (opt-in)</li>
    </ul>

    <h2 class="text-xl font-semibold mt-6 mb-2">4. Your rights</h2>
    <p>You may request to view, edit, or delete any personal data stored by us.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">5. Contact</h2>
    <p>For any questions regarding this policy, please contact us via the form or email.</p>

    <p class="mt-8 text-sm text-gray-500">Last updated: {{ now()->format('F Y') }}</p>
</div>
@endsection
