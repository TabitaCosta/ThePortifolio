<div class="modal fade" id="modalPortifolio" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPortifolioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPortifolioLabel">Portifolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/add/portfolio" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Titulo</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo</label>
            <select class="form-control" name="type" id="exampleFormControlSelect1">
              <option value="sass">SASS</option>
              <option value="pass">PASS</option>
              <option value="integral">VENDA</option>
              <option value="api">API</option>
              <option value="support">SUPORTE</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Url</label>
            <input type="text" name="url" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
      </div>
    </div>
  </div>
</div>