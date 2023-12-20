<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestionar clientes') }}
        </h2>
        <br>
        <a href="{{ route('cliente.create') }}" class=" mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">REGISTRAR</a>
        <br><br>
        <h2 class="{{ true ? 'font-semibold text-xl text-gray-800 leading-tight' : 'font-semibold text-xl text-white leading-tight' }}">Esta vista ha sido visitada {{ $vista->contador }} veces.</h3>
    </x-slot>

    <div class="py-12">
 <!-- Modal toggle -->
    

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6">
                                    ID
                                </th>
                                <th scope="col" class="px-6">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6">
                                    Apellido
                                </th>
                                <th scope="col" class="px-6">
                                    Celular
                                </th>
                                <th scope="col" class="px-6">
                                    Correo
                                </th>
                                <th scope="col" class="px-6">
                                    Genero
                                </th>
                                <th scope="col" class="px-6">
                                    Editar
                                </th>
                                <th scope="col" class="px-6">
                                    Eliminar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clientes as $cliente)
                                <tr class="bg-white border-b dark:bg-gray-300 dark:border-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">

                                        {{-- <img class="w-50 h-50 rounded-full" src="{{ $cliente->imagen_movil }}"  alt="image description"> --}}
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{$cliente->id }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{$cliente->nombre }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{$cliente->apellido }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{$cliente->celular }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{$cliente->correo }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{$cliente->genero }}
                                    </td>
                                   
                                    <td class="py-4 px-6">
                                            <a href="{{ route("cliente.edit", [$cliente->id]) }}">
                                                <button  class="text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 mr-2 mb-2">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                  </button>
                                            </a>
                                    </td>
                                    <td class="py-4 px-6">
                                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="default-modal{{$cliente->id}}">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                        </button>
                                    </td>
                                </tr>
                                <div id="default-modal{{$cliente->id}}" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                                    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                                        <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                                    Eliminar
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal{{$cliente->id}}">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                </button>
                                            </div>
                                            <div class="p-6 space-y-6">
                                                <p class="text-gray-500 text-base leading-relaxed dark:text-gray-400">
                                                    Esta seguro que desea eliminar este registro?
                                                </p>
                                                
                                            </div>
                                            <div class="flex space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <form class="inline" method="POST" action="{{ route("cliente.destroy", [$cliente->id]) }}">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 mr-2 mb-2">
                                                        Eliminar
                                                    </button>
                                                </form>
                                                <button data-modal-toggle="default-modal{{$cliente->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"><td class="py-4 px-6">No hay registros</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
