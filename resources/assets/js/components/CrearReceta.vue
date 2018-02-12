<template>
  <div class="container">

    <div class="row">
      <div class="col-md-6" style="text-align:center">
        <h1 class="display-4" style="margin-top:20px;">Area de creacion</h1>
        <hr>
        <div class="progress" style="margin-top:7px;">
          <div class="progress-bar bg-dark progress-bar-striped progress-bar-animated transition" role="progressbar" :style="{width: barra + '%'}" v-bind="{'aria-valuenow': barra}" aria-valuemin="0" aria-valuemax="96"></div>
        </div>
        <br>
        <form  v-on:submit.prevent="guardarReceta"class="" action="" method="post">
          <div class="row" style="margin-bottom: 15px;">

            <div class="col">
              <input type="text" v-on:keyup="ActualizarBarra()" class="form-control" v-model='Nombre_Receta' id="formGroupExampleInput" placeholder="Nombre de la receta">
            </div>
            <div class="col">
                  <input type="text" v-on:keyup="ActualizarBarra()" class="form-control" v-model='origen' id="formGroupExampleInput2" placeholder="Origen de receta">
            </div>
          </div>

          <div class="form-group">
            <textarea type="text" v-on:keyup="ActualizarBarra()" v-model='descripcion' class="form-control" id="formGroupExampleInput2" placeholder="Descripcion de receta(breve)">aa</textarea>
          </div>
          <div class="form-group">
            <textarea type="text" v-on:keyup="ActualizarBarra()" v-model='instrucciones' class="form-control" id="formGroupExampleInput2" placeholder="Instrucciones para preparar receta"></textarea>
          </div>
          <div class="row">
            <div class="col">
              <select v-model='categoria' class="form-control" @change="ActualizarBarra()" style="margin-bottom: 10px;" id="exampleFormControlSelect1">
                <option>Postre</option>
                <option>Panaderia</option>
                <option>Platillo internacional</option>
                <option>Entrada</option>
                <option>Plato principal</option>
                <option>Ensalada</option>
                <option>Desayuno</option>
                <option>Otros</option>
              </select>
              <div class="row" style="padding: 0 15px">
                <p class="text-muted">Tiempo estimado</p>
                <input v-model="hora" v-on:keyup="ActualizarBarra()" type="text"  class="form-control" maxlength="2" style="margin-left:10px; width:15%; text-align:center; padding: 0.5rem 0.5rem; height:25px;" name="" value="">
                <small style="margin-left:10px;" class="text-muted">:</small>
                <input v-model="minutos"  v-on:keyup="ActualizarBarra()" type="text" class="form-control" maxlength="2" style="margin-left:10px; width:15%; text-align:center; padding: 0.5rem 0.5rem; height:25px;" name="" value="">
            </div>
          </div>
            <!--Area preview-->


            <div class="col">
              <ul class="list-group">
                <li class="list-group-item margen-li borde_bootstrap" style="position:relative;"><p style="margin:0px" class="lead">Ingredientes</p>
                  <a v-on:click.prevent v-on:click="crearEpacioReceta()" class="btn btn-sm btn-default clickeable" style="position:absolute; top:3px; right:0px;">
                    <img src="/iconos/add_ingredient.svg" width="20px" height="20px" alt="">
                  </a>
                </li>

                <div class="" style="position:relative" v-for="ingrediente in ingredientes">
                  <input v-model="ingrediente.nombre"  type="text"  v-on:keyup="ActualizarBarra()" placeholder="1kg Papa, 1Litro Leche" class="form-control list-group-item margen-li">
                  <a href="#"  v-on:click.prevent v-on:click="eliminarEspacioReceta(ingrediente.nombre)" class="clickeable" style="position:absolute; top:2px; right:10px;">
                  <img style="color:red;" src="/iconos/eliminar.svg" width="20px" height="20px" alt=""> </a>
         </div>
              </ul>
            </div>
            </select>
          </div>
          <div class="row" style="margin: 10px 0px; padding: 0;">
              <input type="file" @change="procesarImagen() " class="form-control" name="file" id="file">
          </div>
        <div class="row justify-content-center" style="margin: 20px 0px; padding: 0;">
          <div class="col-md-6" style="padding:0; ">
            <button type="submit"  name="button" class="btn btn-dark" v-bind:class="{disabled : disabledd}">Guardar receta</button>
          </div>

        </div>
        </form>
      </div>


      <div class="col-md-6">
          <h1 class="display-4" style="margin-top:20px;">{{Nombre_Receta}}</h1>
        <hr v-if="Nombre_Receta">
        <small class="text-muted">{{categoria}} - {{origen}}</small>
        <div class="">
          <p class="lead">{{descripcion}}</p>
          <p>{{instrucciones}}</p>
          <img v-if="hora" src="/iconos/reloj.svg" width="20px" height="20px" alt=""><small v-if="hora" style="margin-left:5px;" class="text-muted">{{hora}}:{{minutos}} mins</small>
        </div>

        <div class="row" style="margin-top:10px;">
          <div class="col-md-6">
            <ul>
              <li v-for="ingrediente in ingredientes">{{ingrediente.nombre}}</li>
            </ul>
          </div>
          <div v-if="url" class="col-md-6">
            <img v-bind:src="url" alt="..." class="img-thumbnail">
          </div>
        </div>

      </div>
    </div>
    </div>

</template>


<script>
import axios from 'axios'

export default {
data: function(){
  return{
    ingredientes:[],
    instrucciones:"",
    descripcion:"",
    origen:"",
    Nombre_Receta:"",
    categoria:'',
    hora:"",
    minutos:"",
    barra : 0,
    imagen: '',
    url:'',
    disabledd: true,
    image:''
  }
},
methods:{
  procesarImagen: function(){
    var file = document.getElementById('file');
    this.url = URL.createObjectURL(file.files[0]);
    this.imagen = file.files[0].name;
    this.ActualizarBarra();

    /* metodo de tutorial */
    var e = event;
    console.log(e.target);
    var filereader = new FileReader();
    filereader.readAsDataURL(e.target.files[0]);
    filereader.onload = (e) => {
    this.image = e.target.result;
    }
  },
  crearEpacioReceta: function(){
    this.ingredientes.push({
      nombre:''
    });
  },
  eliminarEspacioReceta: function(ingrediente){
    for(var i=0; i<this.ingredientes.length; i++){
      if(this.ingredientes[i].nombre == ingrediente){
        this.ingredientes.splice(i,1);
        break;
      }
    }
  },
  ActualizarBarra: function(){
    this.barra = 0;
    if(this.Nombre_Receta != ''){
      this.barra = this.barra + 12;
    }
    if(this.instrucciones != ''){
      this.barra = this.barra + 12;
    }
    if(this.descripcion != ''){
      this.barra = this.barra + 12;
    }
    if(this.hora != ''){
      this.barra = this.barra + 12;
    }
    if(this.categoria != ''){
      this.barra = this.barra + 12;
    }
    if(this.ingredientes.length > 0){
      this.barra = this.barra + 12;
    }
    if(this.minutos != ''){
      this.barra = this.barra + 12;
    }
    if(this.origen != ''){
      this.barra = this.barra + 12;
    }
    if(this.imagen != ''){
      this.barra = this.barra + 4;
    }
    if(this.barra == 100){
      this.disabledd = false;
    }else{
      this.disabledd = true;
    }
  },
  guardarReceta: function(){
    var url = 'guardar-receta';
    axios.post(url,{
      name: this.Nombre_Receta,
      ingredients: this.ingredientes,
      category: this.categoria,
      timesVoted: '0',
      totalvotes: '0',
      instructions: this.instrucciones,
      description: this.descripcion,
      author: 'johangel',
      origen: this.origen,
      horas: this.hora,
      min: this.minutos,
      image:this.image
    }).then(response =>{
      console.log(response);
    }).catch(error=>{
      console.log(error.response)
    })
  }

}
}
</script>

<style lang="css">
  .margen-li{
    padding: 5px 10px;
  }
  .borde_bootstrap{
    border:1px solid rgba(0, 0, 0, 0.25);
    border-radius: 0.25rem !important;
  }
  .clickeable:hover{
    cursor: pointer;
  }
  .transition{
    transition: width 1s;
  }
</style>
