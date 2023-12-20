<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registrar cuenta
        </h2>
        
        <br><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Esta vista ha sido visitada {{ $vista->contador }} veces.</h3>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full">
                    <div class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        @if ($errors->any())
                            <div class="bg-red-500 text-white p-4">
                                <ul>
                                    Tienes algunas validaciones
                                </ul>
                            </div>
                        @endif
                    <form method="POST" action="{{ route('cuenta.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">{{ __('Escribe tu cuenta') }}
                            </h2>
                            <div class="relative mb-4">
                                <label for="correo"
                                    class="leading-7 text-sm text-gray-600">{{ __('Correo') }}</label>
                                <input type="text" required id="correo" name="correo" value="{{ old('correo') }}"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @error('correo')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="clave"
                                    class="leading-7 text-sm text-gray-600">{{ __('Clave') }}</label>
                                <input type="text" required required id="clave" name="clave" value="{{ old('clave') }}"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @error('clave')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="fecha_compra"
                                    class="leading-7 text-sm text-gray-600">{{ __('Fecha compra') }}</label>
                                <input type="date" required id="fecha_compra" name="fecha_compra" value="{{ old('fecha_compra') }}"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @error('fecha_compra')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="fecha_vencimiento"
                                    class="leading-7 text-sm text-gray-600">{{ __('Fecha compra') }}</label>
                                <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @error('fecha_vencimiento')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="id_plataforma"
                                    class="leading-7 text-sm text-gray-600">{{ __('Categoria') }}</label>
                                <select id="id_plataforma" name="id_plataforma"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach ($plataformas as $plataforma)
                                        <option value="{{ $plataforma->id }}">{{ $plataforma->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('id_plataforma')
                                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                
                                <button type="submit"
                                    class=" mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear
                                    cuenta</button>
                            </div>

                        </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
