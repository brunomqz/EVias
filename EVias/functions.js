controleCampos = 1;

function addCampos() {
    controleCampos++;
    document.getElementById('camposAdd').insertAdjacentHTML('beforebegin', '<tr id="campo'+ controleCampos +'"><td><button class="delCampo" onclick="delCampos('+ controleCampos +')">X</button></td><td><input class="form22" type="date" name="fdata[]" id="fdata" required></td><td><input class="form22" type="text" name="fmaterial[]" id="fmaterial"></td><td><input class="form22" type="number" name="fvolume[]" id="fvolume"></td><td><input class="form22" type="text" name="fprocedencia[]" id="fprocedencia"></td><td><input class="form22" type="text" name="fcliente[]" id="fcliente"></td><td><input class="form22" type="text" name="fentrega[]" id="fentrega"></td><td><input class="form22" type="text" name="frecebe[]" id="frecebe"></td><td><input class="form22" type="text" name="fprotocolo[]" id="fprotocolo" required></td></tr>');
}

function delCampos(idCampo) {
    document.getElementById('campo' + idCampo).remove();
}
