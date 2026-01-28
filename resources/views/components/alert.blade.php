@props(['type' => 'note', 'title' => '', 'message' => ''])

<div>
    @if ($title)
        <strong>{{ $title }}</strong>
    @endif

    @if ($message)
        <p>{{ $message }}</p>
    @endif

    {{ $slot }}
</div>
