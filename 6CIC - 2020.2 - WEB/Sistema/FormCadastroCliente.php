

<form action="CadastroDados.php" method="post">
    <div class="row LinhaForm">
        <div class="col-lg-5">
            <label>Id do Cliente: </label>
            <input type="text" name="HTML_idCliente" class="form-control">
        </div>
        <div class="col-lg-7">
            <label>Nome da Empresa: </label>
            <input type="text" name="HTML_nomeEmpresa" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-8">
            <label>Representante: </label>
            <input type="text" name="HTML_representante" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>Cargo: </label>
            <input type="text" name="HTML_cargo" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-8">
            <label>Endereço: </label>
            <input type="text" name="HTML_endereco" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>Cidade: </label>
            <input type="text" name="HTML_cidade" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-4">
            <label>Estado: </label>
            <input type="text" name="HTML_estado" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>País: </label>
            <input type="text" name="HTML_pais" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>CEP: </label>
            <input type="text" name="HTML_cep" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Telefone: </label>
            <input type="text" name="HTML_telefone" class="form-control">
        </div>
        <div class="col-lg-6">
            <label>E-mail: </label>
            <input type="text" name="HTML_email" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-12">  
                <input type="hidden" name="tabela" value="customers">
                <button type="submit" class="btn btn-dark float-right">Cadastrar Cliente</button>            
        </div>
    </div>
    
</form>

