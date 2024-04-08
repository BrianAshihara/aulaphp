<?php

namespace App\Services;

use App\Models\Autor;
use App\Services\AutorServiceInterface;
use Illuminate\Http\Request;

class AutorService implements AutorServiceInterface {

    private $repository;
    public function __construct(Autor $autor)
    {
        $this->repository = $autor;
    }

    public function index($pesquisar, $perPage) {
        $registro = $this->repository->where(function($query) use($pesquisar){
            if($pesquisar){
                $query->where("nome","like","%".$pesquisar."%");
                $query->orWhere("email","like","%".$pesquisar."%");
                $query->orWhere("telefone","like","%".$pesquisar."%");
            }
        })->paginate($perPage);

        return $registro;

    }
    

    public function create() {

    }

    public function store(Request $request) {

        $this->repository->create($request->all());
    }

    public function show(string $id) {
        $registro = $this->repository->find($id);

        return (
            ["registro" => $registro]
        );
    }

    public function edit(string $id) {

    }

    public function update(Request $request, string $id) {

        // $request->validate([
        //     $registro = $request->all()
        // ]);

        $registro = $request->all();   

        $autor = $this->repository->find($id);

        $autor -> update($registro);
    }

    public function delete($id) {}
    
    public function destroy(string $id) {
        $registro = $this->repository->find($id);

        $registro->delete();
    }

}