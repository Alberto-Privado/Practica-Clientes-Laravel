<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $clientes = Cliente::all();
        $op = $request->session()->get('op');
        $result = $request->session()->get('result');
        $datos = [
            'clientes' => $clientes
            ];
        if(isset($result)) {
            $resultado = [
                    'destroy'   => [
                        0 => ['danger', 'El borrado ha fallado'],
                        1 => ['success', 'El borrado ha sido un éxito']
                        ],
                    'update'    => [
                        0 => ['danger', 'La edición ha fallado'],
                        1 => ['success', 'La edición ha sido un éxito']
                        ],
                    'store'     => [
                        0 => ['danger', 'El insertado ha fallado'],
                        1 => ['success', 'El insertado ha sido un éxito']
                        ],
                ];
            $datos += [
                    'tipo'      => $resultado[$op][$result][0],
                    'mensaje'   => $resultado[$op][$result][0],
                ];
        }
        return view('Cliente.index')->with($datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
      $input = $request->validated(); // Array asociativo con los valores validados y limpios
      $cliente = new Cliente($input); // Crea un objeto de tipo Prodcuto si los nombres de los campos de $input coinciden con los de Producto.php
      $cliente->ip = $request->ip();
      try{
          $result = $cliente->save();
      } catch(\Exception $e) {
          $error = ['nombre' => 'El nombre utilizado ya existe'];
          return redirect(route('cliente.create'))->withErrors($error)->withInput();
      }
      // $mensaje = 'Todo bien';
      return redirect(route('cliente.index'))->with(['result' => $result, 'op' => 'store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        
        return view('Cliente.show')->with(['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        
        return view('Cliente.edit')->with(['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        // $error = ['nombre' => 'El nombre utilizado ya existe'];
        $input = $request->validated();
        try{
          $result = $cliente->update($input);
        } catch(\Exception $e) {
          return redirect('cliente/' . $cliente->id . '/edit')->withInput();
        }
        return redirect(route('cliente.index')) -> with(['result' => $result, 'op' => 'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        try{
            $cliente -> delete();
            $result = true;
        } catch(\Exception $e){
            $result = false;
        }
        return redirect(route('cliente.index')) -> with(['result' => $result, 'op' => 'destroy']);
    }
}
