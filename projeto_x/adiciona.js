var controle = 1;
function adicionaCampo() {
    controle++;
    console.log(controle);
    document.getElementById('camposAdd').insertAdjacentHTML('afterend', '<tr id="campo"><td><input class="form22" type="date" name="fdata" id="fdata" required></td><td><input class="form22" type="text" name="fmaterial" id="fmaterial" ></td><td><input class="form22" type="text" name="fmaterial" id="fmaterial" ></td><td><input class="form22" type="text" name="fprocedencia" id="fprocedencia" ></td><td><input class="form22" type="text" name="fcliente" id="fcliente" ></td> <td><input class="form22" type="text" name="fentrega" id="fentrega" ></td><td><input class="form22" type="text" name="frecebe" id="frecebe" ></td><td><input class="form22" type="text" name="fprotocolo" id="fprotocolo" required></td></tr>');
}



