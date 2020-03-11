<?php include 'header.php'; ?>
<body>
<div id="container">
  <div id="title">
      <h1>
        Produto <button  class='btn btn-dark' onclick="window.location='index.php'">Voltar</button>
      </h1>
  </div>
  <div id="grid">
      <div id="tools">
          <button class='btn btn-primary' onclick=addProduto();>Adicionar</button>
      </div>

      <div id="form_add_produto" class="d-none">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <form action="/sendData/add_produto.php" method="post">
                <div class="form-group">
                  <label for="id_produto_tipo">Tipo ID</label>
                  <input type="name" class="form-control" name="id_produto_tipo"  placeholder="Id tipo de produto">
                </div>
                <div class="form-group">
                  <label for="titulo">Título</label>
                  <input type="name" class="form-control" name="titulo"  placeholder="Título">
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="name" class="form-control" name="descricao"  placeholder="Descrição">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Preço</label>
                  <input type="name" class="form-control" name="preco"  placeholder="Preço">
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
                <div class="btn btn-dark" onclick=$("#form_add_produto").addClass('d-none')>Fechar</div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="form_edit_produto" class="d-none">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <form action="/sendData/edit_produto.php" method="post">
                <div class="form-group">
                  <label for="id_produto_tipo">Tipo ID</label>
                  <input type="name" class="form-control" name="edit_id_produto_tipo" id="edit_id_produto_tipo"  placeholder="Id tipo de produto">
                </div>
                <div class="form-group">
                  <label for="titulo">Título</label>
                  <input type="hidden" class="form-control" name="edit_id_produto" id="edit_id_produto" >
                  <input type="name" class="form-control" name="edit_titulo" id="edit_titulo"  placeholder="Título">
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="name" class="form-control" name="edit_descricao" id="edit_descricao"  placeholder="Descrição">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Imposto</label>
                  <input type="name" class="form-control" name="edit_preco" id="edit_preco" placeholder="Preço">
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
                <div class="btn btn-dark" onclick=$("#form_edit_tipo_produto").addClass('d-none')>Fechar</div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php  include 'getData/getProduto.php'; ?>      
  </div>
</div>
<?php include 'footer.php'; ?>