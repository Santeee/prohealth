@extends('layouts.master')

@section('styles')
    <style>
        .cambio-item-info { 
            margin-bottom: 0px !important;
        }
    </style>    
@endsection

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <a href="{{ route('burnout') }}" class="btn btn-link pull-right">Burnout report</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <h2>
                                    {{ $user->hospital->nombre }}
                                    <small>Dirección: {{ $user->hospital->direccion }}</small>
                                </h2>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 text-right">
                                <span style="font-weight: bold;">Disponible para turnos?</span>
                                <div class="switch pull-right">
                                    <label><input type="checkbox" @if($user->disponible) checked="" @endif><span class="lever switch-col-blue"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 text-rigth">
                                <div class="form-group">
                                    <div class="form-line" id="bs_datepicker_container">
                                        <input type="text" id="dd" class="form-control" placeholder="Please choose a date..." v-model="fecha_solicitud">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <button class="btn btn-success" @click="showModalCambio"> Ask for </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Requested</h4>

                                <div v-for=""></div>

                                <ul class="list-group">
                                    <li class="list-group-item" v-for="cambio in cambios">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cambio-item-info">
                                                <h5>@{{ cambio.dia }}</h5>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-4 cambio-item-info">
                                                <p>@{{ cambio.solicitante.name }}</p>
                                                <p>@{{ cambio.sector.nombre }}</p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-4 cambio-item-info">
                                                <p><strong>from</strong> @{{ cambio.hora_comienzo }}</p>
                                                <p><strong>to</strong> @{{ cambio.hora_fin }}</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 cambio-item-info">
                                                <button type="button" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float" @click="confirmarAceptacion(cambio)">
                                                    <i class="material-icons">call_missed_outgoing</i>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default Size -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Accept</h4>
                    </div>
                    <div class="modal-body">
                        <p>Do you accept the request of @{{ name_selected }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" @click="aceptarTurno">ACCEPT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default Size -->
        <div class="modal fade" id="requestModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Request</h4>
                    </div>
                    <div class="modal-body">
                        <h4>You will request a change for @{{ fecha_solicitud }} day</h4>
                        <h5></h5>
                        <form class="form-horizontal">
                            {{-- <input type="hidden" value=@{{ fecha_solicitud }} name="dia"> --}}
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="hora_cominenzo">Start time:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="hora_comienzo" class="form-control" placeholder="00:00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="hora_fin">End time:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="hora_fin" class="form-control" placeholder="00:00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="password_2">Sector:</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <select class="selectpicker" id="sector_id" name="sector_id">
                                        @foreach ($sectores as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" @click="solicitarCambio">ACCEPT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')
    <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                cambios: [],
                cambio_selected: {},
                name_selected: '',
                fecha_solicitud: '',
            },
            methods: {
                confirmarAceptacion: function(cambio){
                    this.cambio_selected = cambio;
                    this.name_selected = cambio.solicitante.name;
                    $('#defaultModal').modal('show');
                },
                aceptarTurno: function(){
                    let datos = {
                    }

                    fetch('/cambios/'+this.cambio_selected.id+"/aceptar", {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify(datos)
                    })
                    .then(res => res.json() )
                    .then(data => {
                        console.log(data);
                        if (data.id) {
                            alert("Solicitud aceptada!");
                            this.loadCambios();
                            $('#defaultModal').modal('hide');
                        } else {
                            alert("ingrese todos los datos respetando el formato.");
                        }
                    })
                },
                loadCambios: function(){
                    fetch('/cambios', {
                            method: 'GET',
                            headers: {
                                Accept: 'application/json',
                            }})
                    .then((resp) => resp.json())
                    .then((data) => { this.cambios = data.cambios } )
                    .catch(err => console.log(err));
                },
                showModalCambio: function(){
                    this.fecha_solicitud = $('#dd').val();

                    if (this.fecha_solicitud == ''){
                        alert('Choose a date.');
                        return false;
                    }

                    $('#requestModal').modal('show');

                },
                solicitarCambio: function(e){
                    e.preventDefault();
                    let cambio_nuevo = {
                        dia: this.fecha_solicitud,
                        hora_comienzo: $('#hora_comienzo').val(),
                        hora_fin: $('#hora_fin').val(),
                        sector_id: $('#sector_id').val()
                    }

                    fetch('/cambios', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify(cambio_nuevo)
                    })
                    .then(res => res.json() )
                    .then(data => {
                        console.log(data);
                        if (data.id) {
                            alert("Solicitud guardada!");
                            this.loadCambios();
                            $('#requestModal').modal('hide');
                        } else {
                            alert("ingrese todos los datos respetando el formato.");
                        }
                    })

                }
            },
            created: function () {
                this.loadCambios();
            }
        })

        $('#bs_datepicker_container input').datepicker({
            autoclose: true,
            container: '#bs_datepicker_container'
        }); 
        $(function () {
            $('select').selectpicker();
        });
    </script>
@endsection