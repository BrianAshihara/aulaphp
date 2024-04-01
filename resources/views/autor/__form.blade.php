<div>    
    <div class="mb-3">
            <Label class="form-label">Nome</Label>
            <!-- isset é para validar se o campo é nulo -->
            <input class="form-control @error('nome') is-invalid @enderror" 
                type="text"
                name="nome"
                id="nome"
                value="{{ isset($registro->nome ?? old('nome') ''}}">
                @error('nome')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="mb-3">
            <Label class="form-label">Apelido</Label>
            <!-- isset é para validar se o campo é nulo -->
            <input class="form-control @error('apelido') is-invalid @enderror"
                type="text"
                name="apelido"
                id="apelido"
                value="{{ isset($registro->apelido ?? old('apelido') ''}}">
                @error('apelido')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="mb-3">
            <Label class="form-label @error('cidade') is-invalid @enderror">Cidade</Label>
            <!-- isset é para validar se o campo é nulo -->
            <input class="form-control" 
                type="text"
                name="cidade"
                id="cidade"
                value="{{ isset($registro->cidade ?? old('cidade') ''}}">
                @error('cidade')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="mb-3">
            <Label class="form-label @error('bairro') is-invalid @enderror">Bairro</Label>
            <!-- isset é para validar se o campo é nulo -->
            <input class="form-control"
                type="text"
                name="bairro"
                id="bairro"
                value="{{ isset($registro->bairro) ?? old('bairro')''}}">
                @error('bairro')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="mb-3">
            <Label class="form-label @error('cep') is-invalid @enderror">CEP</Label>
            <!-- isset é para validar se o campo é nulo -->
            <input class="form-control"
                type="text"
                name="cep"
                id="cep"
                value="{{ isset($registro->cep) ?? old('cep')''}}">
                @error('cep')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="mb-3">
            <Label class="form-label @error('email') is-invalid @enderror">E-mail</Label>
            <!-- isset é para validar se o campo é nulo -->
            <input class="form-control" 
                type="text"
                name="email"
                id="email"
                value="{{ isset($registro->email) ?? old('email')''}}">
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="mb-3">
            <Label class="form-label @error('telefone') is-invalid @enderror">Telefone</Label>
            <!-- isset é para validar se o campo é nulo -->
            <input class="form-control" 
                type="text"
                name="telefone"
                id="telefone"
                value="{{ isset($registro->telefone) ?? old('telefone')''}}">
                @error('telefone')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
</div>    


<!-- <pre>
    {{ print_r($errors) }}
</pre> -->