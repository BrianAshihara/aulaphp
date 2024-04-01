<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorFormRequest;
use App\Models\Autor;
use App\Services\AutorServiceInterface;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    // faça a injeção de dependência do context
    private $service;
    public function __construct(AutorServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //dd($request->all());
        $pesquisar = $request->pesquisar;
        $page = $request->perPage;

        //essa variavel service eu criei no construtor e atribui o valor do model
        $registros =  $this->service->index($pesquisar, $page);
        //$registros = Autor::index(10);

        return view('autor.index', [
            'registros'=> $registros['registros'],
            'pages'=> [5,10,15,20],
            'item' => 5,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //dd('acessando controller - create');
        return view('autor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutorFormRequest $request)
    {
        $this->service->store($request);
        return redirect()->route('autor.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $registro = $this->service->show($id);

        return view('autor.show', [
            'registro' => $registro['registro'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //complete a função de editar
        $registro = $this->service->show($id);

        return view('autor.edit', [
            'registro'=> $registro['registro'],
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorFormRequest $request, string $id)
    {
        //

        //dd('Testeeeeee');
        $this->service->update($request, $id);

        return redirect()->route('autor.index');

    }

    public function delete($id) {
        $registro = $this->service->show($id);
        
        return view('autor.destroy', [
            'registro'=> $registro['registro'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $this->service->destroy($id);
        
        return redirect()->route('autor.index');
        
    }
}
