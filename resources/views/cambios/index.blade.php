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
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <h2>
                                    HOSPITAL REGIONAL DE USHUAIA
                                    <small>Dirección: Leopoldo Lugones 1920</small>
                                </h2>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 text-right">
                                <span style="font-weight: bold;">Disponible para turnos?</span>
                                <div class="switch pull-right">
                                    <label><input type="checkbox" checked=""><span class="lever switch-col-blue"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 text-rigth">
                                <div class="form-group">
                                    <div class="form-line" id="bs_datepicker_container">
                                        <input type="text" class="form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <button class="btn btn-success"> Ask for </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Requested</h4>

                                <div v-for=""></div>

                                <ul class="list-group">
                                    <li class="list-group-item" v-for="cambio in cambios">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-4 cambio-item-info">
                                                <p>@{{ cambio }}</p>
                                                <p>@{{ cambio }}</p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-4 cambio-item-info">
                                                <p>@{{ cambio }}</p>
                                                <p>@{{ cambio }}</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 cambio-item-info">
                                                <button type="button" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float" @click="confirmarAceptacion">
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
        </div>>

        <!-- Default Size -->
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Accept</h4>
                    </div>
                    <div class="modal-body">
                        <p>Do you accept the request of @{{ cambio_selected.nombre_usuario }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" @click="aceptarTurno">ACCEPT</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')
    <script src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                cambios: ['asd','asd','asd','asd','asd','asd','asd','asd'],
                cambio_selected: ''
            },
            methods: {
                confirmarAceptacion: function(){
                    this.cambio_selected = { nombre_usuario: 'Santiago aguilar' };
                    $('#defaultModal').modal('show');
                },
                aceptarTurno: function(){
                    $('#defaultModal').modal('hide');
                    alert('Turno aceptdo correctamente!');
                }
            },
            created: function () {
                this.message = 'asdasd';
            }
        })

        $('#bs_datepicker_container input').datepicker({
            autoclose: true,
            container: '#bs_datepicker_container'
        });
    </script>
@endsection