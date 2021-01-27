/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 //Import Sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000,
timerProgressBar: true,
onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast = Toast

Vue.component('modal', {
    template: '#modal-template',    

})

const app = new Vue({
    el: '#app',

    data: {
        newCar: {'marca': '', 'modelo': '' , 'ano': '' , 'fabricacao': '' , 'placa': ''},
        hasError: true,
        cars: [],
        e_id: '',
        e_marca: '',
        e_modelo: '',
        e_ano: '',
        e_fabricacao: '',
        e_marca: '',
        modalShow: true,
     },

    //Quando a pagina carregar chamemos essa função para exibir os dados 
    mounted: function mounted(){
        this.getCars();
    },

    methods: {

    getCars: function getCars(){
        var _this = this;
        axios.get('/getCars').then(function(response){
            _this.cars = response.data;
        }).catch(error=>{
            console.log("Get All: "+error);
        });
    },

    
    createCar: function createCar() {
        var input = this.newCar;
        var _this = this;
    if(input['marca'] == '' || input['modelo'] == ''|| input['ano'] == ''|| input['fabricacao'] == ''|| input['placa'] == '') {
        this.hasError = false;
    }
    else {
        this.hasError= true;
        axios.post('/storeCar', input).then(function(response){
            _this.newCar = {'marca': '', 'modelo': '', 'ano': '','fabricacao': '','placa': '',}
            _this.getCars();
        }).catch(error=>{
            console.log("Insert: "+error);
        });
    }
},
  

    setVal(val_id, val_marca, val_modelo,val_ano, val_fabricacao, val_placa) {
        this.e_id = val_id;
        this.e_marca = val_marca;
        this.e_modelo = val_modelo;
        this.e_ano = val_ano;
        this.e_fabricacao = val_fabricacao;
        this.e_placa = val_placa;
    },

    editCar: function editCar(){
        var _this = this;
        var id_val_1 = document.getElementById('e_id');
        var marca_val_1 = document.getElementById('e_marca');
        var modelo_val_1 = document.getElementById('e_modelo');
        var ano_val_1 = document.getElementById('e_ano');
        var fabricacao_val_1 = document.getElementById('e_fabricacao');
        var placa_val_1 = document.getElementById('e_placa');
        var model = document.getElementById('myModal').value;
         axios.post('/editCars/' + id_val_1.value, {val_1: marca_val_1.value, val_2: modelo_val_1.value,val_3: ano_val_1.value,val_4: fabricacao_val_1.value,val_5: placa_val_1.value})
           .then(response => {
            $('#modalmy').modal('hide');
             _this.getCars();
           });      
           
    },

    deleteCar: function deleteCar(car) {
        var _this = this;
        axios.post('/deleteCar/' + car.id).then(function(response){
         _this.getCars();
            }).catch(error=>{
                  console.log("Delete car: "+error);
                  });
    },

    }

    
});


