<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/6300b62ad7.js" crossorigin="anonymous"></script>
</head>
<body>
    <table class="table" id="tabla">
        <thead>
            <tr>
                <th>Alias</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-4 offset-md-4">
            <button class="btn btn-primary btn-sm btn-block btn-nuevo">
                Nuevo
                <i class="fas fas-plus"></i>
            </button>
        </div>
    </div>



<div class="modal fade" tabindex="-1" id="modal" role="dialog">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="row">
                <div class="col-12">
                    <label for="sAlias">Alias</label>
                    <input type="text" id="sAlias" class="form-control">
                </div>
                <div class="col-4">
                    <label for="sMarca">Marca</label>
                    <input type="text" id="sMarca" class="form-control">
                </div>
                <div class="col-4">
                    <label for="nModelo">Modelo</label>
                    <input type="number" min="1950" max="2026" title="Modelo del transporte, aacepta valores entre 1950 y 2026" id="nModelo" class="form-control">
                </div>
                <div class="col-4">
                    <label for="sPlacas">Placas</label>
                    <input type="text" id="sPlacas" class="form-control">
                </div>
            </div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn-save">guardar</button>
      </div>
    </div>
  </div>
</div>
<script src="./assets/jquery/jquery-3.6.1.min.js"></script>
<script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./frontend/index.js"></script>
</body>
</html>