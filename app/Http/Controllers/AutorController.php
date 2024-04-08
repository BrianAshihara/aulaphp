<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorFormRequest;
use App\Models\Autor;
use App\Services\AutorServiceInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        $pesquisar = $request->pesquisar ?? "";
        $perPage = $request->perPage ?? 5;

        //essa variavel service eu criei no construtor e atribui o valor do model
        $registros =  $this->service->index($pesquisar, $perPage);
        //$registros = Autor::index(10);

        return view('autor.index', [
            'registros'=> $registros,
            'perPage'=>$perPage,
            'filter'=> $pesquisar,
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

        $registro = $request->all();

        try{
                $this->service->store($registro);
                return redirect()->route('autor.index')->with('success','Registro realizado');
        }catch(Exception $e){
                return view('autor.create',[
                    'registro'=>$registro,
                    'fail'=>$e->getMessage(),
                ]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $registro = null;
   
        try{
            $this->service->show($id);
            return view('autor.show',[
                'registro'=>$registro,
            ]);
    }catch(Exception $e){
            return view('autor.edit',[
                'registro'=>$registro,
                'fail'=>$e->getMessage(),
            ]);
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //complete a função de editar
        try{
            $this->service->edit($id);
            return view('autor.edit',[
                'registro'=>$registro,
            ]);
    }catch(Exception $e){
            return view('autor.edit',[
                'registro'=>$registro,
                'fail'=>$e->getMessage(),
            ]);
    }   $registro = $this->service->show($id);

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
   
        $registro = $request->all();

        try{
                $this->service->update($registro, $id);
                return redirect()->route('autor.index')->with('success','Registro realizado');
        }catch(Exception $e){
                return view('autor.edit',[
                    'registro'=>$registro,
                    'fail'=>$e->getMessage(),
                ]);
        }

    }

    public function delete($id) {
        try{
            $this->service->show($id);
            return view('autor.destroy',[
                'registro'=>$registro,
            ]);
    }catch(Exception $e){
            return view('autor.destroy',[
                'registro'=>$registro,
                'fail'=>$e->getMessage(),
            ]);
    }   
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->service->destroy($id);
            return redirect()->route('autor.index')->with('success','Registro realizado');
    }catch(Exception $e){
            return view('autor.destroy',[
                'fail'=>$e->getMessage(),
            ]);
    }


        return redirect()->route('autor.index');
        
    }
  
}
