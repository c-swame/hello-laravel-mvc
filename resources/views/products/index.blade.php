<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>

    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('product.create') }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                        Novo Produto
                    </button>
                </a>
            @endif
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <table class="w-full">
                    <thead>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Preço (R$)</th>
                        <th>Estoque</th>
                        @if(auth()->user()->role == 'admin')
                        <th>...</th>
                        @endif
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr class="text-center  border-2">
                                <td class="border-1">{{$product->id}}</td>
                                <td class='min-h-52 max-h-52 h-52 text-center'>
                                    <img class="h-52 mx-auto" src="{{$product->imgPath}}" alt="{{$product->name}}"/>
                                    @if ($product->imgPath == '')
                                        {{$product->name}}
                                    @endif
                                </td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->stock}}</td>
                                <td>
                                <div class="hidden sm:flex sm:items-center sm:ms-6 flex-col">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <div>...</div>

                                                <div class="ms-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('product.show', ['id' => $product->id])">
                                                {{ __('Atualizar') }}
                                            </x-dropdown-link>

                                            <!-- Authentication -->
                                            <form method="post" id="deleteForm" action="{{ route('product.delete', ['id' => $product->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="(event) => {event.preventDefault(); this.querySelector('.deleteForm').submit();}">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
