<?php

namespace App\Http\Controllers;

use App\Models\Vista;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(5);
        $vista = Vista::where('nombre_vista','cliente.index')->first();
        // Incrementar el contador
        if ($vista) {
            $contador = $vista->contador + 1;
            $vista->contador = $contador;
            $vista->save();
        }else{
            $vista = new Vista;
            $vista->nombre_vista = 'cliente.index';
            $vista->contador = 1;
            $vista->save(); 
        }
        return view('cliente.index', ['clientes' => $clientes,'vista' => $vista]);
    }

    public function create()
    {
        $vista = Vista::where('nombre_vista','cliente.create')->first();
        // Incrementar el contador
        if ($vista) {
            $contador = $vista->contador + 1;
            $vista->contador = $contador;
            $vista->save();
        }else{
            $vista = new Vista;
            $vista->nombre_vista = 'cliente.create';
            $vista->contador = 1;
            $vista->save(); 
        }
        return view('cliente.create', ['vista' => $vista]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:15',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->celular = $request->input('celular');
        $cliente->correo = $request->input('correo');
        $cliente->genero = $request->input('genero');
        $cliente->save();
        return redirect()->route('cliente.index');

    }
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $vista = Vista::where('nombre_vista','cliente.edit')->first();
        // Incrementar el contador
        if ($vista) {
            $contador = $vista->contador + 1;
            $vista->contador = $contador;
            $vista->save();
        }else{
            $vista = new Vista;
            $vista->nombre_vista = 'cliente.create';
            $vista->contador = 1;
            $vista->save(); 
        }
        return view('cliente.edit', ['cliente' => $cliente,'vista' => $vista]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:15',
            'apellido' => 'required|string|max:30',
            'celular' => 'required|string|max:8',
            'correo' => 'required|string|min:8|max:50',
            'genero' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->celular = $request->input('celular');
        $cliente->correo = $request->input('correo');
        $cliente->genero = $request->input('genero');
        $cliente->update();
        return redirect()->route('cliente.index');
    }
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index');
    }

}
