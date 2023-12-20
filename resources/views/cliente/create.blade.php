<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Registrar cliente
      </h2>
      <br><br>
      <h2 class="{{ true ? 'font-semibold text-xl text-gray-800 leading-tight' : 'font-semibold text-xl text-white leading-tight' }}">Esta vista ha sido visitada {{ $vista->contador }} veces.</h3>
  </x-slot>

  <div class="py-12">
      
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                  
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4">
                        <ul>
                            Tienes algunas validaciones
                        </ul>
                    </div>
                @endif
          <form method="POST" action="{{route('cliente.store')}}" enctype="multipart/form-data"> 
              @csrf
              
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                  <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">{{ __("Escribe tu cliente") }}</h2>
                    <div class="relative mb-4">
                      <label for="nombre" class="leading-7 text-sm text-gray-600">{{ __("Nombre") }}</label>
                      <input type="text" id="nombre" required name="nombre" value="{{ old("nombre") }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('nombre')
                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                        @enderror
                    </div>
                    <div class="relative mb-4">
                        <label for="apellido" class="leading-7 text-sm text-gray-600">{{ __("Apellido") }}</label>
                        <input type="text" id="apellido" required name="apellido" value="{{ old("apellido") }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          @error('apellido')
                              <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                          @enderror
                    </div>
                    <div class="relative mb-4">
                        <label for="correo" class="leading-7 text-sm text-gray-600">{{ __("Correo") }}</label>
                        <input type="text" id="correo" required name="correo" value="{{ old("correo") }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          @error('correo')
                              <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                          @enderror
                    </div>
                    <div class="relative mb-4">
                        <label for="celular" class="leading-7 text-sm text-gray-600">{{ __("Celular") }}</label>
                        <input type="text" id="celular" required name="celular" value="{{ old("celular") }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          @error('celular')
                              <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                          @enderror
                    </div>
                    <div class="relative mb-4">
                        <label for="genero"
                            class="leading-7 text-sm text-gray-600">{{ __('Genero') }}</label>
                        <select id="genero" required name="genero"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                        </select>
                        @error('genero')
                            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span></p>
                        @enderror
                    </div>
                
                  <div class="relative mb-4">
                      <button type="submit" class=" mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear cliente</button>
                  </div>
                  
              </div>
          </form>
              </div>
          </div>
      </div>
  </div>
  


</x-app-layout>
