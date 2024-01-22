<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualizar Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="post" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$product->name}}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-3">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.1" min="0" name="price" value="{{$product->price}}" required />
                    </div>

                    
                    <div class="mt-3">
                        <x-input-label for="stock" :value="__('Stock')" />
                        <x-text-input id="stock" class="block mt-1 w-full" type="number" step="1" min="0" name="stock" value="{{$product->stock}}" required />
                    </div>

                    <div class="mt-3">
                        <x-input-label for="img" :value="__('Image')" />
                        <input name="img" class="block mt-1 w-full" type="file" :value="$product->img" accept="image/png, image/jpeg, image/svg">
                    </div>

                    
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Atualizar') }}
                        </x-primary-button>
                    </div>
                </form>

                </div>
        </div>
    </div>
</x-app-layout>