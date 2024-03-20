<form action="" autocomplete="off" method="post">
    <div class="search">
        <div include="form-input-select()">
            <select name="button1" id="button1">
                <option value="">Turmas</option>
                <option value="adm">ADM</option>
                <option value="ds">DS</option>
            </select>
        </div>
        <div include="form-input-select()">
            <select name="button2" id="button2">
                <option value=''>Período</option>
                <option value="todos">Todos</option>
                <option value="manha">Manhã</option>
                <option value="noite">Noite</option>
            </select>
        </div>

        <input type="submit" value="Buscar" name="turma" id="botao">
    </div>
</form>