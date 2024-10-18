@props(['value'])

<<<<<<< HEAD
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
=======
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
>>>>>>> a896e740bcb64db0f518526dfabe0efa96ec6d2e
    {{ $value ?? $slot }}
</label>
