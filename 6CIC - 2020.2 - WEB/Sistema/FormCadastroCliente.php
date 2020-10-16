

<form action="CadastroDados.php" method="post">
    <div class="row LinhaForm">
        <div class="col-lg-5">
            <label>Id do Cliente: </label>
            <input type="text" name="data[0]" class="form-control">
        </div>
        <div class="col-lg-7">
            <label>Nome da Empresa: </label>
            <input type="text" name="data[1]" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-8">
            <label>Representante: </label>
            <input type="text" name="data[2]" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>Cargo: </label>
            <input type="text" name="data[3]" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-8">
            <label>Endereço: </label>
            <input type="text" name="data[4]" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>Cidade: </label>
            <input type="text" name="data[5]" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-4">
            <label>Estado: </label>
            <input type="text" name="data[6]" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>País: </label>
            <input type="text" name="data[7]" class="form-control">
        </div>
        <div class="col-lg-4">
            <label>CEP: </label>
            <input type="text" name="data[8]" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Telefone: </label>
            <input type="text" name="data[9]" class="form-control">
        </div>
        <div class="col-lg-6">
            <label>E-mail: </label>
            <input type="text" name="data[10]" class="form-control">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-12">  
                <input type="hidden" name="tabela" value="customers">
                <button type="submit" class="btn btn-dark float-right">Cadastrar Cliente</button>            
        </div>
    </div>
    
</form>

