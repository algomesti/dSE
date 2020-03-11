
function addProdutoTipo() {
    $("#form_add_tipo_produto").removeClass('d-none');
    $("#form_edit_tipo_produto").addClass('d-none');
}


function editProdutoTipo(id, titulo, descricao, imposto) {
    $("#edit_id").val(id);
    $("#edit_titulo").val(titulo);
    $("#edit_descricao").val(descricao);
    $("#edit_imposto").val(imposto);

    $("#form_add_tipo_produto").addClass('d-none');
    $("#form_edit_tipo_produto").removeClass('d-none');
    
}


function removeProdutoTipo(id) {
    window.location='/sendData/remove_produto_tipo.php?id='+id;
}


function addProduto() {
    $("#form_add_produto").removeClass('d-none');
    $("#form_edit_produto").addClass('d-none');
}

function editProduto(id_produto, id_produto_tipo, titulo, descricao, imposto) {
    $("#edit_id_produto").val(id_produto);
    $("#edit_id_produto_tipo").val(id_produto_tipo);
    $("#edit_titulo").val(titulo);
    $("#edit_descricao").val(descricao);
    $("#edit_preco").val(imposto);

    $("#form_add_produto").addClass('d-none');
    $("#form_edit_produto").removeClass('d-none');
}

function removeProduto(id) {
    window.location='/sendData/remove_produto.php?id='+id;
}


function addVenda() {
    $("#form_add_venda").removeClass('d-none');
    $("#form_edit_venda").addClass('d-none');

}

function editVenda(id_venda, id_produto, valor, quantidade) {
    $("#edit_id_venda").val(id_venda);
    $("#edit_id_produto").val(id_produto);
    $("#edit_valor_unitario").val(valor);
    $("#edit_quantidade").val(quantidade);
    $("#form_add_venda").addClass('d-none');
    $("#form_edit_venda").removeClass('d-none');
}

function removeVenda(id) {
    window.location='/sendData/remove_venda.php?id='+id;
}
