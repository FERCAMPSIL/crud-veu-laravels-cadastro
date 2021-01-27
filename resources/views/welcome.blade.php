<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cadastro de Carros</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin-bottom: 25%;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                
                justify-content: center;
                margin-left: 20%;
                margin-right: 20%;
            }
            .position-ref {
                position: relative;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
           
            .modal-header {
                display: inline-block;
                text-align: center;
                vertical-align: middle;
            }
        </style>
</head>
<body>

<div id="app">
        <div class="flex-center position-ref full-height">
            <div class="content">
          
                <div class="title m-b-md">
                    Cadastro de Carros
                </div>

                <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
                    All fields are required!
                </div>

                <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" required placeholder="Marca" name="model" v-model="newCar.marca">
                 </div>

                <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" required placeholder="Modelo" name="modelo" v-model="newCar.modelo">
                </div>

                <div class="form-group">
                <label for="ano">Ano</label>
                <input type="text" class="form-control" id="Ano" required placeholder="Ano" name="ano" v-model="newCar.ano">
                </div>
                                                   
                <div class="form-group">
                <label for="fabricacao">Fabricação</label>
                <input type="text" class="form-control" id="fabricacao" required placeholder="Fabricação" name="fabricacao" v-model="newCar.fabricacao">
                </div>

                <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" required placeholder="Placa" name="fabricacao" v-model="newCar.placa">
                </div>
            
                <button class="btn btn-primary" @click.prevent="createCar()">
                    Adicione Carro
                </button>
       <br>
       <br>

        <table class="table table-striped" id="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Fabricação</th>
                <th scope="col">Placa</th>
                <th scope="col">Acões</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for ="car in cars">
                <th scope="row">@{{car.id}}</th>
                <td>@{{car.marca}}</td>
                <td>@{{car.modelo}}</td>
                <td>@{{car.ano}}</td>
                <td>@{{car.fabricacao}}</td>
                <td>@{{car.placa}}</td>

                <td @click="setVal(car.id, car.marca, car.modelo, car.ano,car.fabricacao, car.placa)"  class="btn btn-info" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i>
                </td>
                <td  @click.prevent="deleteCar(car)" class="btn btn-danger"> 
                <i class="fa fa-trash"></i>
                </td>
                </tr>
            </tbody>
        </table>

        {{--  modal  --}}
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" id ="modalmy">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Editar Carro</h2>
            </div>

            <div class="modal-body">
                <input type="hidden" disabled class="form-control" id="e_id" name="id" required :value="this.e_id">
                    Marca: <input type="text" class="form-control" id="e_marca" name="marca" required :value="this.e_marca">
                    Modelo: <input type="text" class="form-control" id="e_modelo" name="modelo" required  :value="this.e_modelo">
                    Ano: <input type="text" class="form-control" id="e_ano" name="ano" required :value="this.e_ano">
                    Fabricacao: <input type="text" class="form-control" id="e_fabricacao" name="fabricacao" required  :value="this.e_fabricacao">
                    Placa: <input type="text" class="form-control" id="e_placa" name="placa" required :value="this.e_placa">
                    
            </div>    
                                    
            <div class="modal-footer">
                <button type="button" class="btn btn-primary " @click="editCar()">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>  
    <script type="text/javascript" src="/js/app.js">
 
    </script>
</body>

</html>
