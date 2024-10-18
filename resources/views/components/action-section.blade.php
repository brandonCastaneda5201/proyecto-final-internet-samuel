<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
<<<<<<< HEAD
        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
=======
        <div class="px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
>>>>>>> a896e740bcb64db0f518526dfabe0efa96ec6d2e
            {{ $content }}
        </div>
    </div>
</div>
