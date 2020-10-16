<form action="CadastroDados.php" method="post">
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Primeiro Nome: </label>
            <input type="text" name="data[1]" class="form-control" maxlength="10">
        </div>
        <div class="col-lg-6">
            <label>Último Nome: </label>
            <input type="text" name="data[2]" class="form-control" maxlength="20">
        </div>
    </div>
    <div class="row LinhaForm">
        
        <div class="col-lg-3">
            <label>Data de Nascimento: </label>
            <input type="date" name="data[5]" class="form-control">
        </div>
        <div class="col-lg-3">
            <label>Data de Contratação: </label>
            <input type="date" name="data[6]" class="form-control">
        </div>
        <div class="col-lg-3">
            <label>Cargo: </label>
            <input type="text" name="data[3]" class="form-control" maxlength="30">
        </div>
        <div class="col-lg-3">
            <label>Título de Cortesia: </label>
            <input type="text" name="data[4]" class="form-control" maxlength="25">
        </div>
        
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-8">
            <label>Endereço: </label>
            <input type="text" name="data[7]" class="form-control" maxlength="60">
        </div>
        <div class="col-lg-4">
            <label>Cidade: </label>
            <input type="text" name="data[8]" class="form-control" maxlength="15">
        </div>
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-3">
            <label>Estado: </label>
            <input type="text" name="data[9]" class="form-control" maxlength="15">
        </div>
        <div class="col-lg-3">
            <label>País: </label>
            <input type="text" name="data[11]" class="form-control" maxlength="15">
        </div>
        <div class="col-lg-3">
            <label>CEP: </label>
            <input type="text" name="data[10]" class="form-control" maxlength="10">
        </div>
        <div class="col-lg-3">
            <label>Telefone Residencial: </label>
            <input type="text" name="data[12]" class="form-control" maxlength="24">
        </div>
        
    </div>
    <div class="row LinhaForm">
        <div class="col-lg-12">  
                <input type="hidden" name="data[0]" value="">
                <input type="hidden" name="tabela" value="employees">
                <button type="submit" class="btn btn-dark float-right">Cadastrar Funcionário</button>            
        </div>
    </div>
</form>