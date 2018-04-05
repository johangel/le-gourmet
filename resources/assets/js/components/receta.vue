<template lang="html">
  <div class="bg-white" style="min-height: 91vh;">
    <div class="row" style="margin: 0px 0px !important;">
      <h1 class="lead display-4 mg-auto">Buscador de Recetas</h1>
    </div>
    <br><hr><br>
    <div class="row" style="padding: 20px 20px; margin: 0px 0px !important;">
      <div class="col-md-3">
        <div class="form-buscador mg-auto txt-center">
          <form class="" action="" method="post">
            <div class="form-group">
              <input v-model="nombreBusqueda"  v-on:keyup="filtrarRecetas" class="form-control" placeholder="Nombre receta">
            </div>
            <div class="form-group">
              <select class="form-control">
                <option>Postre</option>
                <option>Panaderia</option>
                <option>Platillo internacional</option>
                <option>Entrada</option>
                <option>Plato principal</option>
                <option>Ensalada</option>
                <option>Desayuno</option>
                <option>Otros</option>
              </select>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Nacionalidad">
            </div>
            <div class="form-group">
              <input class="form-control" v-model="autorBusqueda" v-on:keyup="filtrarRecetas" placeholder="Autor">
            </div>
            <input type="button" class="btn btn-dark btn-sm mg-auto" value="Buscar">
          </form>
        </div>
      </div>
      <div class="col-md-6" style="width: fill; padding: 0px;">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nombre Receta</th>
              <th scope="col">Autor</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="receta in this.recetaFiltradas">
              <td>{{receta.name}}</td>
              <td>{{receta.author}}</td>
              <td><button v-on:click="CagrgarReceta(receta.id)" class="btn btn-sm btn-primary">Preview</button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-3 txt-center" style="padding: 0px;">
        <h1 class="txt-center lead">{{recetaDisplay.name}}</h1>
        <p>{{recetaDisplay.author}}</p>
        <p>{{recetaDisplay.categoria}}</p>
        <img class="img-preview" :src="/images/ + recetaDisplay.img" width="150px" height="150px"><br>
        <button type="button" v-on:click="VerRecetaParticular" class="btn btn-sucees" name="button">Ver receta</button>
      </div>
    </div>

    <div  class="recetaVista" v-show="isActive" style="padding-top: 9vh;"  v-bind:class="{recetaOn: isActive}">
      <div  class="imagenPrincipal">
          <img src="/iconos/flecha_izquierda.svg" style="position:absolute; z-index:10" width="60px" height="60px" v-on:click="isActive = false"></img>
          <img :src="/images/ + recetaParticular.img" style="width:100%; height:100%;" alt="">
      </div>
      <div class="container" style="position: relative;">
      <div class="row">
      <div class="col-md-4 perfil" style="position:relative; text-align:center;">
        <img :src="/fotosDePerfil/ + datosPerfil.imagen_perfil" alt="..." class="img-thumbnail img-perfil">
        <p class="lead" style="font-size: 30px;">{{recetaParticular.author}}</p>

        <div class=" justify-content-center">
          <div class="Votos_display">
            {{recetaParticular.UpVotes}}
          </div>
          <div class="row justify-content-center" style="margin:0 auto;">
            <div class="mano_izquierda" v-on:click="EnviarVoto(1, recetaParticular.id, 'ma')">
              <img src="/iconos/manito_arriba.svg"  class="imagen ma" style="margin-right: 5px;" alt="">
            </div>
            <div class="mano_derecha" v-on:click="EnviarVoto(-1, recetaParticular.id,' mb')">
              <img src="/iconos/manito_abajo.svg"  class="imagen mb" style="margin-left: 5px;" alt="">
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-8" style="margin-top: 20px;">
            <h1 class="display-4" style="">{{recetaParticular.name}}</h1>
          <hr>
          <small class="text-muted">{{recetaParticular.category}} - {{recetaParticular.origen}}</small>
          <div class="">
            <p class="lead"> {{recetaParticular.description}}</p>
            <p>{{recetaParticular.instructions}}</p>
            <img src="/iconos/reloj.svg" width="20px" height="20px" alt=""><small style="margin-left:5px;" class="text-muted">{{recetaParticular.horas}}:{{recetaParticular.min}} horas</small>
          </div>
          <div class="row" style="margin-top:10px;">
            <div class="col-md-12">
              <ul>
              <li v-for="ingrediente in recetaParticular.ingredients">{{ingrediente.nombre}}</li>
              </ul>
            </div>

            <div class="row" style=" width: 100%; margin-bottom:30px;">
              <div class="card" style="width: 80%; margin: 5px auto; padding: 0 !important;" v-for="comentario in comentarios">
                <div class="card-body" style="padding: 5px !important;">
                  <p class="card-text"><a :href="'http://localhost:8000/User/'+ comentario.idUsuario" class="lead">{{comentario.nombreUsuario}}</a> &nbsp;{{comentario.comentario}}.</p>
                </div>
              </div>
              <div class="row justify-content-between" style="width: 80%; margin: 5px auto;">
                <textarea type="text" style="height: 40px !important; width: 70%;" class="form-control" v-model="comentario" placeholder="Comentario"></textarea>
                <button class="btn btn-sm btn-dark" v-on:click="Comentar(recetaParticular.id)" style="height:41px!important; width: 25%" name="button">Comentar</button>
              </div>
            </div>
          </div>

      </div>
    </div>
    </div>
  </div>
  </div>
</template>

<script>
  export default {
  created: function(){
    this.cargarRecetas();
  },
  data: function(){
    return({
        recetas: [],
        isActive: false,
        recetaFiltradas: [],
        recetaDisplay: {},
        nombreBusqueda:'',
        autorBusqueda:'',
        recetaParticular:{},
        datosPerfil:{},
        comentarios:'',
        comentario:''

    })
  },
  methods:{
    cargarRecetas: function(){
      var urlRecipes = 'recipee';
      axios.get(urlRecipes).then(response =>{
        this.recetas = response.data;
        this.recetaFiltradas = this.recetas;
      });
    },

    Comentar: function(id){
      var url = '/EnviarComentario';
      axios.post(url,{
        comentario : this.comentario,
        idUsuario : $('meta[name="authId"]').attr("content"),
        nombreUsuario: $('meta[name="authUsername"]').attr("content"),
        idReceta: id,
      }).then(response =>{
        console.log(response.data);
      }).catch(error =>{
        console.log(error);
      });
      this.CargarComentarios(id);
    },

    CargarComentarios: function(id){
      var url ="/CargarComentarios/" + id;
      axios.get(url).then(response =>{
        console.log(response.data[0]);
        this.comentarios = response.data;
        console.log(this.comentarios);
      }).catch(error =>{
        console.log(error);
      })
    },
    VerRecetaParticular: function(){
        this.recetaParticular = this.recetaDisplay;
        var url2 = '/UserData2/' + this.recetaDisplay.author;
        axios.get(url2).then(response =>{
          this.datosPerfil = response.data;
          console.log(this.datosPerfil.imagen_perfil);
          this.CargarComentarios(this.recetaParticular.id);
          this.isActive = true;
        })

    },
    EnviarVoto(valorVoto,idReceta, className){
      var url ="/EnviarVoto";
      axios.post(url,{
        usuarioId : $('meta[name="authId"]').attr("content"),
        valor : valorVoto,
        recetaId: idReceta
      }).then(response =>{
        console.log(response.data);
        this.recetaParticular.UpVotes = this.recetaParticular.UpVotes + response.data;
        console.log(className);
        document.getElementsByClassName(className)[0].style.transform = "rotate(360deg)";
      }).catch(error =>{
        console.log(error);
      })
    },

    filtrarRecetas: function(){
      this.recetaFiltradas = this.recetas.filter((receta) =>{
        return receta.name.toUpperCase().match(this.nombreBusqueda.toUpperCase());
      })
      if(this.autorBusqueda != ''){
        this.recetaFiltradas = this.recetaFiltradas.filter((receta) =>{
        return receta.author.toUpperCase().match(this.autorBusqueda.toUpperCase());
      })
    }
    },

    CagrgarReceta: function(id){
     var url = '/GetReceta/' + id;
      axios.get(url).then(response =>{
        this.recetaDisplay = response.data[0];

      }).catch(error=>{
        console.log(error);
      })
    }

  }

}
</script>

<style lang="css">
.bg-white{
  background: white;
}
.mg-auto{
  margin: auto;
}
.form-buscador{
  border-radius: 10px;
}
.txt-center{
  text-align:center;
}
.img-preview{
  border: 2px white solid;
  border-radius: 100px;
}
.recetaOn{
  margin-left: 0 !important;
}
.recetaVista{
  position: absolute;
  margin-left: -110%;
  z-index: 2;
  transition: margin-left 1.5s;
  width: 100%;
  min-height: 92vh;
  top: 0px;
  background-color: #E3E3E3;
}
.imagenPrincipal{
  height: 70vh;
  background-repeat: no-repeat, repeat;
  background-position: center center;
  background-size: cover;
  position:relative;
}
.Votos_display{
  transition: all 1s;
  position: relative;
  height: 8vh;
  background: #343A40;
  width: 40%;
  margin: auto;
  line-height: 52px;
  text-align: center;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
  font-size: 30px;
  font-style: italic;
  color: white;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.mano_izquierda{
  border-bottom-left-radius: 10px;
  width: 20%;
  background-color:green;
  height: 40px !important;
  text-align: center;
  line-height: 35px;
  transition: 1s all;
}
.mano_derecha{
  border-bottom-right-radius: 10px;
  width: 20%;
  background-color: #c30101;
  height: 40px !important;
  text-align: center;
  line-height: 35px;
  transition: 1s all;
}
.mano_derecha:hover, .mano_izquierda:hover{
  cursor: pointer;
}
.ma,.mb{
  transition: 1s all;
}
.imagen{
  width: 25px;
  height: 25px;
}
.img-perfil{
  width: 15rem;
  height: 15rem;
  background-color: none;
  border: 0px !important;
  border-radius: 7.5rem;
}
.perfil{
  position: absolute;
  transform: translateY(-20%);
}
</style>
