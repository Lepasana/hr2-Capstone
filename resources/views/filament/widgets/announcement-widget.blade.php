<x-filament-widgets::widget class="w-full">
    <x-filament::section class="w-full p-6 bg-blue-100 rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800">📢 Announcement</h1>

        @if ($announcement)
            <div class="mt-2 text-gray-700 w-full prose">
                {!! $announcement->content !!}
            </div>
        @else
            <p class="mt-2 text-gray-500">No announcements available.</p>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
