<template lang="html">
  <div class="">
    <div class="container">
        <transition name="fade1">
          <div v-show="!isActive" class="row" style="transition: all 1;">
            <div class="col-md-4" id="vista_foto_perfil">
                <img v-if="datosPerfil.imagen_perfil" :src="/fotosDePerfil/ + datosPerfil.imagen_perfil" alt="..."  style="width: 100%; height:300px;">
              <ul class="list-group" >
                <li class="list-group-item border-dark" style="border-top-left-radius:0; border-top-right-radius:0; border: 0px; margin-bot:10px;">
                  <img src="/iconos/llavesita.svg" v-if="this.abilitarCambios" v-on:click="opcionesActivas = !opcionesActivas" style="position: absolute; z-index:2;" class="svg-blanco icono-rotate" alt="">
                  <p class="lead link"><strong>Biografia</strong></p>
                  <p class="text-muted">{{datosPerfil.descripcion}}</p>
                  <hr>
                  <span class="lead-link">Categoria favorita: </span><span class="text-muted">{{datosPerfil.categoriasFavoritas}}</span>
                </li>
                <div class="collapse" id="caja1">
                  <li class="list-group-item border-dark" style="border-radius: 0px; border: 0px; border-top: 6px solid #E3E3E3 !important;">
                    <p class="lead link"><strong>Contacto</strong></p>
                    <ul class="list-unstyled" style="margin-bottom: 16px;">
                      <li class="text-muted"><strong>Correo: </strong> {{datosPerfil.correoUsuario}}</li>
                      <br>
                      <li>
                         <span class="input-group-addon borders-rectangle">
                           <img src="/iconos/twitter.svg" class="imagen" alt="" style=" margin-right: 20px;">@{{datosPerfil.twitter}}
                         </span>
                      </li>
                      <li>
                         <span class="input-group-addon borders-rectangle">
                           <img src="/iconos/facebook.svg" class="imagen" alt="" style=" margin-right: 20px;">/{{datosPerfil.facebook}}
                         </span>
                      </li>
                    </ul>
                  </li>
                </div>
                <div class="row" style="margin: 0px 0px;">
                  <button class="btn btn-dark btn-sm col" style="border-radius :0px; border-bottom-left-radius: 10px;  border-bottom-right-radius: 10px;" data-toggle="collapse" href="#caja1">Informacion </button>
                </div>
              </ul>
            </div>
            <div class="col-md-8" style="background:white; padding: 0 15px;">
            <transition name="fade" id="vista_recetas">
              <div v-show="!opcionesActivas" style="background:white">
                  <p class="display-4" style="margin-bottom:0px; margin-top:10px;">{{datosPerfil.nombre}}</p>
                  <small class="text-muted">{{datosPerfil.nacionalidad}} {{datosPerfil.edad}}</small>
                  <br>
                  <hr class="text-dark">
                  <br>
                  <div class="row justify-content-center">
                    <h3 class="display-4" style="margin-bottom: 40px;">Recetas agregadas</h3>
                    <div v-for="receta in recetasPerfil" class="card" style="width:30rem;  margin-bottom:20px;">
                      <img v-if="receta.img" class="card-img-top huerotate" :src="/images/ + receta.img" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{receta.name}}</h5>
                        <p class="card-text">{{receta.description}}</p>
                        <button href="#" v-on:click="CagrgarReceta(receta.id)" class="btn btn-dark">Ver receta</button>
                        <button data-toggle="modal" v-if="abilitarCambios" data-target="#exampleModal" class="btn btn-danger">Eliminar receta</button>
                        <button data-toggle="modal" v-if="abilitarCambios" data-target="#exampleModal1" class="btn btn-primary">Editar receta</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" style="color: red;" id="exampleModalLabel">Escribe 'ELIMINAR' en el campo para proceder  eliminar la receta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class="form-group">
                                    <input type="text" v-model="PalabraEliminar" class="form-control" id="recipient-name">
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary"  v-on:click="eliminarReceta(receta.id)" data-dismiss="modal">Confirmar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" style="color: blue;" id="exampleModalLabel">Debes llenar al menos un campo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class="form-group">
                                    <input type="text" v-model="nuevoNombre" class="form-control" id="recipient-name" placeholder="Nombre de receta">
                                  </div>
                                  <div class="form-group">
                                    <input type="text" v-model="nuevaDescripcion" class="form-control" placeholder="Descripcion de receta">
                                  </div>
                                  <div class="form-group">
                                    <textarea type="text" v-model="nuevasInstrucciones" class="form-control" placeholder="Descripcion de receta"></textarea>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="Examplemodal1">Cancelar</button>
                                <button type="button" class="btn btn-primary"  v-on:click="editarReceta(receta.id)" data-dismiss="modal">Confirmar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!--  <nav aria-label="Page navigation ">
                    <ul class="pagination justify-content-center">
                      <li class="page-item "><a class="page-link text-dark" href="#">Previous</a></li>
                      <li class="page-item "><a class="page-link text-dark" href="#">1</a></li>
                      <li class="page-item "><a class="page-link text-dark" href="#">2</a></li>
                      <li class="page-item "><a class="page-link text-dark" href="#">3</a></li>
                      <li class="page-item "><a class="page-link text-dark" href="#">Next</a></li>
                    </ul>
                  </nav>
                 -->
              </div>
            </transition>
            <transition name ="fade1" id="vista_opciones">
             <div v-show="opcionesActivas" style="background:white; padding: 0 20px;">
              <p class="display-4" style="margin-bottom:0px; margin-top:20px;">¡Ayudanos a saber mas de ti!</p>
              <small class="text-muted">Recuerda que esta informacion solo sera visible a otros usuario si quieres. Todos los campos son opcionales.</small>
              <hr>
              <form method="post" v-on:submit.prevent="ActualizarInformacionPersonal" style="margin-top: 50px;" class="">
                <div class="form-group" style="margin-bottom: 50px;">
                 <label for="exampleInputEmail1">Biografia</label>
                 <textarea  v-model="atributosPerfil.descripcion" type="text" class="form-control" rows="2"></textarea>
               </div>
              <div class="row">
                <div class="col-md-4" style="margin-bottom: 35px;">
                  <div class="form-group">
                   <label for="exampleInputEmail1">Nacionalidad</label>
                   <input  v-model="atributosPerfil.nacionalidad" type="text" class="form-control">
                 </div>
                </div>
                <div class="col-md-4" style="margin-bottom: 35px;">
                  <div class="form-group">
                   <label>Nivel de formacion</label>
                   <input  v-model="atributosPerfil.nivelDeFormacion" type="text" class="form-control">
                   <small class="form-text text-muted">Relevantes al mundo de cocina</small>
                 </div>
                </div>
                <div class="col-md-4" style="margin-bottom: 35px;">
                  <div class="form-group">
                   <label>Pais de residencia</label>
                   <input  v-model="atributosPerfil.paisDeResidencia" class="form-control" rows="1">
                 </div>
                </div>
                <div class="col-md-4" style="margin-bottom: 35px;">
                  <div class="form-group">
                   <label>¿A que te dedicas?</label>
                   <select v-model="atributosPerfil.Profesion" class="form-control" rows="1">
                     <option>Estudiante</option>
                     <option>Profesional</option>
                     <option>Otro</option>
                   </select>
                 </div>
                </div>
                <div class="col-md-8" style="margin-bottom: 35px;">
                  <div class="form-group">
                   <label>¿Donde resides actualmente?</label>
                   <input  v-model="atributosPerfil.CiudadResidencia" type="text" class="form-control" placeholder="Ex: Ciudad/Municipio/calle">
                 </div>
                </div>
                <div class="col-md-4" style="margin-bottom: 35px;">
                  <div class="form-group">
                   <label>¿tipo comida favorita?</label>

                   <select  v-model="atributosPerfil.categoriasFavoritas" class="form-control" style="margin-bottom: 10px;" >
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
                </div>
                <div class="col-md-4" style="margin-bottom: 35px;">
                  <div class="form-group">
                   <label>Fecha nacimiento</label>
                   <input v-model="atributosPerfil.edad" class="form-control" type="text" placeholder="Ex: 22">
                 </div>
                </div>

                <div class="col-md-4" style="margin-bottom: 35px;">
                  <div class="form-group">
                   <label>Numero de contacto</label>
                   <input v-model="atributosPerfil.numeroContacto" class="form-control" type="text" placeholder="Ex: +01 2345-67891011">
                 </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 35px;">
                  <div class="form-group">
                     <label>Administra tus redes sociales:</label>
                   <div class="row">
                     <div class="input-group col-4 margin-bot">
                      <span class="input-group-addon espacio-imagen">
                        <img src="/iconos/instagram.svg" class="imagen" alt="">
                      </span>
                      <input  type="text" class="form-control borderless" aria-describedby="sizing-addon2">
                     </div>

                     <div class="input-group col-4 margin-bot">
                      <span class="input-group-addon espacio-imagen">
                        <img src="/iconos/twitter.svg" class="imagen" alt="">
                      </span>
                      <input  v-model="atributosPerfil.twitter" type="text" class="form-control borderless" aria-describedby="sizing-addon2">
                     </div>

                     <div class="input-group col-4 margin-bot">
                      <span class="input-group-addon espacio-imagen">
                        <img src="/iconos/facebook.svg" class="imagen" alt="">
                      </span>
                      <input  v-model="atributosPerfil.facebook" type="text" class="form-control borderless" aria-describedby="sizing-addon2">
                     </div>

                   </div>
                 </div>
                </div>
                <div class="col-md-12" style="margin-bottom: 35px;">
                  <div class="class-form">
                    <label>Foto de perfil</label>
                      <input type="file" @change="cargarImagen()"  class="form-control" name="file" id="file">
                  </div>
                  <div class="row justify-content-between" style="padding: 0 15px; margin-top:20px;">
                    <button class="btn btn-dark" v-on:click.prevent="comprobarDaltonico">Modo Daltonico</button>
                    <button type="submit" class="btn btn-dark">Actualizar Perfil</button>
                    <button class="btn btn-dark" v-on:click.prevent="borrarCampos">Borrar campos</button>
                  </div>

                </div>
              </div>
              </form>
            </div>
            </transition>
            </div>
          </div>
        </transition>
    </div>

    <transition name="fade1">
        <div  class="recetaVista" v-show="isActive"   v-bind:class="{recetaOn: isActive}">
          <div  class="imagenPrincipal">
              <img src="/iconos/flecha_izquierda.svg" style="position:absolute; z-index:10" width="60px" height="60px" v-on:click="esconderReceta()"></img>
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
      </transition>
  </div>
</template>

<script>
  import axios from 'axios'
  import toastr from 'toastr'
  import moment from 'moment'

  export default {
    created: function(){
      this.reconocerPerfil();
      this.ObtenerInformacionPersonal();
    },

    data: function(){
      return(
        {
          isActive: false,
          isActive2: false,
          opcionesActivas: false,
          daltonico: false,
          PalabraEliminar: '',
          datosPerfil:{},
          abilitarCambios: true,
          comentario:'',
          comentarios:'',
          nuevaDescripcion: '',
          nuevasInstrucciones:'',
          nuevoNombre:'',
          recetasPerfil:{
          },
          recetaParticular:{},
          idPerfil:'',
          rutaPerfil:'',
          atributosPerfil:{
            facebook: '',
            twitter: '',
            edad: '',
            correoUsuario: '',
            descripcion: '',
            imagen_perfil: '',
            cumpleaños: '',
            categoriasFavoritas: '',
            blindmode: '',
            nacionalidad:''
          },
        }
      )
    },

    methods:{
      ActualizarInformacionPersonal: function(){
        var id = this.idPerfil;
        var url = "/Userdata/update/" + id;
        axios.post(url,{
          descripcion: this.atributosPerfil.descripcion,
          facebook:this.atributosPerfil.facebook,
          edad: this.atributosPerfil.edad,
          nacionalidad : this.atributosPerfil.nacionalidad,
          categoriasFavoritas: this.atributosPerfil.categoriasFavoritas,
          twitter: this.atributosPerfil.twitter,
          correoUsuario: this.atributosPerfil.correoUsuario,
          blindmode: this.atributosPerfil.blindmode,
          imagen_perfil: this.atributosPerfil.imagen_perfil
        }).then(response =>{
          this.borrarCampos();
          this.ObtenerInformacionPersonal();
          toastr.success('Perfil actualizado');
        }).catch(error =>{
          console.log(error);
        });

      },

      borrarCampos: function(){
        this.atributosPerfil.descripcion= '';
        this.atributosPerfil.facebook='';
        this.atributosPerfil.edad='';
        this.atributosPerfil.nacionalidad='';
        this.atributosPerfil.categoriasFavoritas='';
        this.atributosPerfil.twitter='';
        this.atributosPerfil.correoUsuario='';
        this.atributosPerfil.blindmode='';
        this.atributosPerfil.imagen_perfil='';
      },

      cargarImagen: function(){
        var e = event;
        var filereader = new FileReader();
        filereader.readAsDataURL(e.target.files[0]);
        filereader.onload = (e) => {
        this.atributosPerfil.imagen_perfil = e.target.result;
        }
      },

      ObtenerInformacionPersonal: function(){
        var UrlPerfil;
        var path = window.location.pathname;
        var segments = path.split("/");
        this.rutaPerfil = segments[2];
        if(this.rutaPerfil == 'self'){
          var perfilPropio = $('meta[name="authId"]').attr("content");
          UrlPerfil ='/Userdata/'+ perfilPropio;

        }else{
          UrlPerfil = '/Userdata/'+ this.rutaPerfil;
            this.abilitarCambios = false;
        }
        axios.get(UrlPerfil).then(response=>{
          this.datosPerfil = response.data;
          if(this.datosPerfil.descripcion == null){
            this.datosPerfil.descripcion = 'No hay descripcion disponible';
          }
          if(this.datosPerfil.facebook == null){
            this.datosPerfil.facebook = 'No especificado';
          }
          if(this.datosPerfil.edad == null){
          }else{
            this.datosPerfil.edad = '-' + this.datosPerfil.edad + ' años de edad';
          }
          if(this.datosPerfil.nacionalidad == null){
            this.datosPerfil.nacionalidad = 'Nacionalidad no especificada';
          }
          if(this.datosPerfil.categoriasFavoritas == null){
            this.datosPerfil.categoriasFavoritas = 'No especificada';
          }
          if(this.datosPerfil.imagen_perfil == null){
            this.datosPerfil.imagen_perfil = 'defecto.jpg';
          }
          if(this.datosPerfil.twitter == null){
            this.datosPerfil.twitter = 'No especificado';
          }
            this.cargarRecetas();
        });
      },

      reconocerPerfil: function(){
        this.idPerfil = $('meta[name="authId"]').attr("content");
        console.log(this.idPerfil);
      },

      cargarRecetas: function(){
          var urlRecipes = '/PersonalRecipes/' + this.datosPerfil.nombre;
          axios.get(urlRecipes).then(response =>{
            this.recetasPerfil = response.data;
          }).catch(error =>{
            console.log(error);
          });
      },

      comprobarDaltonico: function(){
        this.daltonico =! this.daltonico;
        var arreglo = document.getElementsByTagName("img");
        if(this.daltonico){
          for(var i=0;i<=arreglo.length; i++){
            arreglo[i].style.filter = "hue-rotate(120deg)";
          }
        }else{
          for(var i=0;i<=arreglo.length; i++){
            arreglo[i].style.filter = "hue-rotate(0deg)";}
          }
        },

      eliminarReceta(id){
        console.log('a' + id);
        console.log(this.PalabraEliminar);
        if(this.PalabraEliminar == 'ELIMINAR'){
          var url = '/eliminarReceta/' + id;
          axios.get(url).then(response=>{
            this.cargarRecetas();
            toastr.success('Receta eliminada con exito');
          }).catch(error =>{
            console.log(error);
          });
        }else{
          toastr.error('No se elimino la receta');
        }
      },

      CagrgarReceta: function(id){
       var url = '/GetReceta/' + id;
        axios.get(url).then(response =>{
          this.recetaParticular = response.data[0];
          this.CargarComentarios(id);
        }).catch(error=>{
          console.log(error);
        })

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
          this.isActive = true;
          this.isActive2 = true;
        }).catch(error =>{
          console.log(error);
        })
      },

      esconderReceta: function(){
        this.isActive = false;
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
      editarReceta: function(id){
        var url="/editarReceta/" + id;
        if(this.nuevaDescripcion !='' || this.nuevasInstrucciones != '' || this.nuevoNombre != ''){
          axios.post(url,{
            name: this.nuevaDescripcion,
            instructions: this.nuevasInstrucciones,
            description: this.nuevaDescripcion,
          }).then(response =>{
            toastr.success('Se edito tu receta');
          }).catch(error =>{
            console.log(error);
          })
        }else{
          toastr.error('Recuerda rellenar los campos');
          }
      }
    },



}
</script>

<style scoped>
  .recetaVista{
    position: absolute;
    margin-left: -110%;
    z-index: 2;
    transition: margin-left 1.5s;
    width: 100%;
    top: 0px;
    background-color: #E3E3E3;
    padding-top: 9vh !important;
  }
  .recetaOn{
    margin-left: 0 !important;

  }
  .imagenPrincipal{
    height: 70vh;
    background-repeat: no-repeat, repeat;
    background-position: center center;
    background-size: cover;
    position:relative;
  }
  .perfil{
    position: absolute;
    transform: translateY(-20%);
  }
  .img-perfil{
    width: 15rem;
    height: 15rem;
    background-color: none;
    border: 0px !important;
    border-radius: 7.5rem;
  }
  .svg-blanco{
    transition: 1s all;
    bottom: 5px;
    right: 5px;
  }
  .icono-rotate:hover{
    cursor: pointer;
    transition: 1s all;
    -ms-transform: rotate(40deg); /* IE 9 */
    -webkit-transform: rotate(40deg); /* Safari 3-8 */
    transform: rotate(40deg);
  }
  .fade-enter-active {
  transition: opacity 1s;
   }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
  }
  .fade1-enter-active, .fade1-leave-active {
  transition: opacity 1s;
   }
  .fade1-enter, .fade1-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
  }
  .form-control{
    border: 1px solid #343A40;
  }
  .margin-bot{
    margin-bottom: 10px;
  }
  .espacio-imagen{
    padding: 8px;
  }
  .imagen{
    width: 25px;
    height: 25px;
  }
  .imagen:hover{
    cursor:pointer;
  }
  .borderless{
    border-left: 0px;
  }
  img{
    transition: filter 0.5s;
  }
  .borders-rectangle{
    border-radius: 0;
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

</style>
