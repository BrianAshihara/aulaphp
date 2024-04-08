<?php

namespace App\Services;

use App\Models\Autor;
use App\Services\AutorServiceInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use App\Services\ModelNotFoundException;

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


        DB::beginTransaction();

        try{

            $registro = $this->repository->create($request);
            DB::commit();
            return $registro;
        } catch( Exception $e)
        {
            DB::rollBack();
            return new Exception('Erro ao criar o registro '. $e->getMessage());
        }
    }

    public function show(string $id) {

        try{
            $registro = $this->repository->findOrfail($id);
            return $registro;

        }catch(ModelNotFoundException $e ){
            throw new Exception('Registro não localizado');

        }
    
    }

    public function edit(string $id) {

    }

    public function update(Request $request, string $id) {


        $autorCadastrado= $this->repository->find($id);
        DB::beginTransaction();

        try{

            $registro = $this->repository->create($request);
            DB::commit();
            return $registro;
        } catch( Exception $e)
        {
            DB::rollBack();
            return new Exception('Erro ao criar o registro '. $e->getMessage());
        }

        $registro = $request->all();   

        

        $autorCadastrado -> update($registro);
    }

    public function delete($id) {}
    
    public function destroy(string $id) {
        $autorCadastrado = $this->show($id);



        DB::beginTransaction();
        try{

            $autorCadastrado->delete();
            DB::commit();
        } catch( Exception $e)
        {
            DB::rollBack();
            return new Exception('Erro ao excluir o registro '. $e->getMessage());
        }
    }

}