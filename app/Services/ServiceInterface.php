<?php   

namespace App\Service;

interface ServiceInterface{
    public function index($pesquisar, $perPage);

    public function show($id);


    public function store($request);
    public function update($request, $id);

    public function destroy($id);
}