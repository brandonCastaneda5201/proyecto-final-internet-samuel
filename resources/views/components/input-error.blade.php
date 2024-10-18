@props(['for'])

@error($for)
<<<<<<< HEAD
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $message }}</p>
=======
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400']) }}>{{ $message }}</p>
>>>>>>> a896e740bcb64db0f518526dfabe0efa96ec6d2e
@enderror
