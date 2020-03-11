<?php include 'header.php'; ?>
<body>
<div id="container">
  <div id="title">
      <h1>
        Vendas <button class='btn btn-dark'  onclick="window.location='index.php'">Voltar</button>
      </h1>
  </div>
  <div id="grid">
      <div id="tools">
          <button class='btn btn-primary'  onclick=addVenda();>Adicionar</button>
      </div>
      <div id="form_add_venda" class="d-none">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <form action="/sendData/add_venda.php" method="post">
                <div class="form-group">
                  <label for="id_produto">Produto ID</label>
                  <input type="name" class="form-control" name="id_produto"  placeholder="Id  produto">
                </div>
                <div class="form-group">
                  <label for="titulo">Valor Unitário</label>
                  <input type="name" class="form-control" name="valor_unitario"  placeholder="Valor unitário">
                </div>
                <div class="form-group">
                  <label for="quantidade">Quantidade</label>
                  <input type="name" class="form-control" name="quantidade"  placeholder="Quantidade">
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
                <div class="btn btn-dark" onclick=$("#form_add_produto").addClass('d-none')>Fechar</div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div id="form_edit_venda" class="d-none">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <form action="/sendData/edit_venda.php" method="post">
              <div class="form-group">
                  <label for="id_produto">Produto ID</label>
                  <input type="hidden" class="form-control" name="edit_id_venda" id="edit_id_venda" placeholder="Id  produto">
                  <input type="name" class="form-control" name="edit_id_produto" id="edit_id_produto" placeholder="Id  produto">
                </div>
                <div class="form-group">
                  <label for="titulo">Valor Unitário</label>
                  <input type="name" class="form-control" name="edit_valor_unitario" id="edit_valor_unitario"  placeholder="Valor unitário">
                </div>
                <div class="form-group">
                  <label for="quantidade">Quantidade</label>
                  <input type="name" class="form-control" name="edit_quantidade" id="edit_quantidade"  placeholder="Quantidade">
                </div>
                <button type="submit" class="btn btn-primary">Salva</button>
                <div class="btn btn-dark" onclick=$("#form_edit_tipo_produto").addClass('d-none')>Fechar</div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php 
        include 'getData/getVenda.php'; 
      ?>      
  </div> 
</div>
<?php include 'footer.php'; ?>