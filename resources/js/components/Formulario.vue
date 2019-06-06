<template>
    <div>
        <h2 class="text-center">FRONT-END DE VUEJS</h2>
            <div class="well">
                <h4>DATOS DE EMPLEADOS</h4>
                <form v-on:submit.prevent="createEmpleado">
                    <input type="text" class="form-control input-sm"  v-model="vmnombres" placeholder="Ingrese nombres">
                    <br>
                    <input type="text" class="form-control input-sm " v-model="vmapellido" placeholder="Ingrese apellidos">
                    <br>
                    <input type="text" class="form-control input-sm " v-model="vmcedula" placeholder="Ingrese cedula">
                    <br>
                    <input type="email" class="form-control input-sm " v-model="vmemail" placeholder="Ingrese email">
                    <br>
                    <input type="text" class="form-control input-sm " v-model="vmlugar_nacimiento" placeholder="Ingrese Lugar Nacimiento">
                    <br>
                    <input type="text" class="form-control input-sm " v-model="vmsexo" placeholder="Ingrese sexo">
                    <br>
                    <input type="text" class="form-control input-sm " v-model="vmestado_civil" placeholder="Ingrese Estado Civil">
                    <br>
                    <input type="text" class="form-control input-sm " v-model="vmtelefono" placeholder="Ingrese Telefono">
                    <br>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-outline-success btn-sm">AGREGAR</button>
                        </span>
                </form>
                <hr>

                <li v-for="empleado in empleados" class="list-unstyled">
                    <p>
                        {{empleado.nombres}}
                        {{empleado.apellido}}
                        {{empleado.cedula}}
                        {{empleado.email}}
                        {{empleado.lugar_nacimiento}}
                        {{empleado.sexo}}
                        {{empleado.estado_civil}}
                        {{empleado.telefono}}
                    </p>
                </li>
                

            </div>
    </div>
</template>

<script>
    
    import axios from 'axios'
    import toastr from 'toastr'

    export default {
       data () {
           return {
               empleados: [],
               nombres:'',
               apellido:'',
               cedula:'',
               email:'',
               lugar_nacimiento:'',
               sexo:'',
               estado_civil:'',
               telefono:'',
           }
       }, 
       created: function (){
           this.getEmpleados();
       },
       methods:{
           getEmpleados: function(){
               var urlEmpleados = '/api/empleados';
               axios.get(urlEmpleados).then(response=> {
                  this.empleados = response.data 
               });
           },
           createEmpleado: function(){
              var url= '/api/empleados';
              axios.post(url, {
                  nombres: this.vmnombres,
                  apellido: this.vmapellido,
                  cedula:this.vmcedula,
                  email:this.vmemail,
                  lugar_nacimiento:this.vmlugar_nacimiento,
                  sexo: this.vmsexo,
                  estado_civil: this.vmestado_civil,
                  telefono: this.vmtelefono                  
              }).then(response=> {
                  this.getEmpleados();
                  this.vmnombres='';
                  this.vmapellido='';
                  this.vmcedula='';
                  this.vmemail='';
                  this.vmlugar_nacimiento='';
                  this.vmsexo='';
                  this.vmestado_civil='';
                  this.vmtelefono='';
                  toastr.success('Empleado registrado');
              }).catch(error=>{
                  toastr.error('Error');
              }); 
           }
       }
    }
</script>



