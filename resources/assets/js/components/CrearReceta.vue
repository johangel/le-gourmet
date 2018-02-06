<template>
  <div class="container">

    <div class="row">
      <div class="col-md-6" style="text-align:center">
        <h1 class="display-4" style="margin-top:20px;">Area de creacion</h1>
        <hr>
        <br>
        <form class="" action="" method="post">
          <div class="row" style="margin-bottom: 15px;">
            <div class="col">
              <input type="text" class="form-control" v-model='Nombre_Receta' id="formGroupExampleInput" placeholder="Nombre de la receta">
            </div>
            <div class="col">
                  <input type="text" class="form-control" v-model='origen' id="formGroupExampleInput2" placeholder="Origen de receta">
            </div>
          </div>

          <div class="form-group">
            <textarea type="text" v-model='descripcion' class="form-control" id="formGroupExampleInput2" placeholder="Descripcion de receta(breve)">aa</textarea>
          </div>
          <div class="form-group">
            <textarea type="text" v-model='instrucciones' class="form-control" id="formGroupExampleInput2" placeholder="Instrucciones para preparar receta"></textarea>
          </div>
          <div class="row">
            <div class="col">
              <select v-model='categoria' class="form-control" style="margin-bottom: 10px;" id="exampleFormControlSelect1">
                <option>Postre</option>
                <option>Panaderia</option>
                <option>Platillo internacional</option>
                <option>Entrada</option>
                <option>Plato principal</option>
                <option>Ensalada</option>
                <option>Desayuno</option>
              </select>
              <div class="row" style="padding: 0 15px">
                <p class="text-muted">Tiempo estimado</p>
                <input v-model="hora" type="text"  class="form-control" maxlength="2" style="margin-left:10px; width:15%; text-align:center; padding: 0.5rem 0.5rem; height:25px;" name="" value="">
                <small style="margin-left:10px;" class="text-muted">:</small>
                <input v-model="minutos" type="text" class="form-control" maxlength="2" style="margin-left:10px; width:15%; text-align:center; padding: 0.5rem 0.5rem; height:25px;" name="" value="">
                <form class="" action="" method="post" enctype="multipart/form-data">
                  Select image to upload
                  <input type="file" name="file" id="file" value="">
                  <input type="submit" name="" value="upload" name="submit">
                </form>
              </div>
            </div>
            <div class="col">
              <ul class="list-group">
                <li class="list-group-item margen-li borde_bootstrap" style="position:relative;"><p style="margin:0px" class="lead">Ingredientes</p>
                  <a v-on:click.prevent v-on:click="crearEpacioReceta()" class="btn btn-sm btn-default clickeable" style="position:absolute; top:3px; right:0px;">
                    <img src="/iconos/add_ingredient.svg" width="20px" height="20px" alt="">
                  </a>
                </li>

                <div class="" style="position:relative" v-for="ingrediente in ingredientes">
                  <input v-model="ingrediente.nombre"  type="text"  placeholder="1kg Papa, 1Litro Leche" class="form-control list-group-item margen-li">
                  <a href="#"  v-on:click.prevent v-on:click="eliminarEspacioReceta(ingrediente.nombre)" class="clickeable" style="position:absolute; top:2px; right:10px;">
                  <img style="color:red;" src="/iconos/eliminar.svg" width="20px" height="20px" alt=""> </a>
         </div>
              </ul>
            </div>
            </select>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <h1 class="display-4" style="margin-top:20px;">{{Nombre_Receta}}</h1>
        <hr>
        <small class="text-muted">{{categoria}} - {{origen}}</small>
        <div class="">
          <p class="lead">{{descripcion}}</p>
          <p>{{instrucciones}}</p>
          <img src="/iconos/reloj.svg" width="20px" height="20px" alt=""><small style="margin-left:5px;" class="text-muted">{{hora}}:{{minutos}} mins</small>
        </div>

        <div class="row" style="margin-top:10px;">
          <div class="col-md-12">
            <ul>
              <li v-for="ingrediente in ingredientes">{{ingrediente.nombre}}</li>
            </ul>
          </div>
        </div>
      </div>

    </div>



  </div>
</template>

<script>
export default {
data: function(){
  return{
    ingredientes:[],
    instrucciones:"",
    descripcion:"",
    nombre:"",
    origen:"",
    Nombre_Receta:"",
    categoria:'',
    hora:"",
    minutos:""



  }
},
methods:{
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
</style>
