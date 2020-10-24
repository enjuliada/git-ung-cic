<form action="CadastroDados.php" method="post">
    <div class="row LinhaForm">
        <div class="col-lg-6">
            <label>Nome da Transportadora: </label>
            <input type="text" name="data[1]" class="form-control" maxlength="40">
        </div>
        <div class="col-lg-6">
            <label>Telefone: </label>
            <input type="text" name="data[2]" class="form-control" maxlength="24">
        </div>
    </div>

    <div class="row LinhaForm">
        <div class="col-lg-12">
                <input type="hidden" name="data[0]" value="">
                <input type="hidden" name="tabela" value="shippers">
                <button type="submit" class="btn btn-dark float-right">Cadastrar Transportadora</button>            
        </div>
    </div>

</form>