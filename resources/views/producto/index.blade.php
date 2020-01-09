@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left"> 
                      <form role="form" method="get" action="/">
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="search" class="form-control float-right">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">Buscar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#crearModal">Crear</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Producto</th>
                          <th scope="col">Bodega</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Gestion</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                          <td>{{$producto->nombre}}</td>
                          <td>{{$producto->bodega_id}}</td>
                          <td>{{$producto->cantidad}}</td>
                          <td><h4><span class="badge {{$producto->estado == 'Activo' ? 'badge-success' : 'badge-danger' }}">{{$producto->estado}}</span></h4>
                          </td>
                          <td>
                            <form action="">
                              
                              <button type="button" onclick="cambiarEstado('{{$producto->id}}')" class="btn btn-dark">Cambiar Estado</button>
                            </form>
                            
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $productos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="crearModal">Crear Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
            <small>Los campos con asterisco(*) son obligatorios</small>
        </div>
        <br>
        <form role="form" method="" action="">
          <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="producto">Producto *</label>
            <input type="text" class="form-control" id="producto" name="producto" required>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="cantidad">Cantidad *</label>
                    <input type="text" name="cantidad" id="cantidad" class="form-control" required>
                </div>
                <div class="col">
                    <label for="estado">Estado *</label>
                    <select class="form-control" id="estado" name="estado" required>
                      <option value="1" selected>Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                </div>
          </div>

          </div>
          
          <div class="form-group">
            <label for="bodega">Bodega *</label>
            <select class="form-control" id="bodega" name="bodega" required>
                @foreach ($bodegas as $bodega)
                <option value="{{$bodega->id}}">{{$bodega->nombre}}</option>
                 @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="guardar()" class="btn btn-dark">Guardar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/producto.js') }}"></script>
@endsection

