<template lang="html">
  <div class="">
    <div class="container">
      <transition>
      <div v-show="!isActive" class="row" style="transition: all 2s;">
        <div class="col-md-4">
          <img src="https://i.imgur.com/J8G70kk.gif" alt="..." style="max-width: 100%;">
          <br>
          <ul class="list-group" >
            <li class="list-group-item border-dark" style="border-top-left-radius:0; border-top-right-radius:0;">
              <p class="lead link"><strong>ABOUT</strong></p>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque pariatur magnam, alias commodi ducimus esse.</p>
            </li>
            <div class="collapse" id="caja1">
              <li class="list-group-item border-dark" style="border-radius: 0px;">
                <p class="lead link"><strong>CATEGORIAS PREFERIDAS</strong></p>
                <ul class="list-unstyled" style="margin-bottom: 16px;">
                  <li class="text-muted">categoria generica</li>
                  <li class="text-muted">categoria generica</li>
                  <li class="text-muted">categoria generica</li>
                </ul>
              </li>
            </div>
            <div class="row" style="margin: 0px 0px;">
              <button class="btn btn-dark btn-sm col" style="border-radius :0px; border-bottom-left-radius: 10px;" data-toggle="collapse" href="#caja1">Categorias Pref</button>
              <button class="btn btn-dark btn-sm col" style="border-radius :0px; border-bottom-right-radius :10px;" data-toggle="collapse" href="caja2">Puntuacion</button>
            </div>
          </ul>
        </div>
        <div class="col-md-8" style="background:white">
          <p class="display-4" style="margin-bottom:0px; margin-top:10px;">Michael jackson</p>
          <small class="text-muted">Estados Unidos, Indiana</small>
          <br>
          <hr class="text-dark">
          <br>
          <div class="row justify-content-center">
            <h3 class="display-4" style="margin-bottom: 40px;">Recetas agregadas</h3>
            <div class="card" style="width:30rem;  margin-bottom:20px;">
              <img class="card-img-top" src="/media/fotogenerica1.jpeg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Burrito poderoso</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dolorum in illum magnam debitis quos amet dignissimos, distinctio eius sint.</p>
                <a href="#" v-on:click="isActive = true" class="btn btn-dark">Ver receta</a>
              </div>
            </div>
            <div class="card" style="width:30rem; margin-bottom:20px;">
              <img class="card-img-top" src="/media/fotogenerica1.jpeg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Burrito poderoso</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dolorum in illum magnam debitis quos amet dignissimos, distinctio eius sint.</p>
                <a href="#" v-on:click="isActive = true" class="btn btn-dark">Ver receta</a>
              </div>
            </div>
            <div class="card" style="width:30rem;  margin-bottom:20px;">
              <img class="card-img-top" src="/media/fotogenerica1.jpeg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Burrito poderoso</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dolorum in illum magnam debitis quos amet dignissimos, distinctio eius sint.</p>
                <a href="#" v-on:click="isActive = true" class="btn btn-dark">Ver receta</a>
              </div>
            </div>
          </div>
          <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center">
              <li class="page-item "><a class="page-link text-dark" href="#">Previous</a></li>
              <li class="page-item "><a class="page-link text-dark" href="#">1</a></li>
              <li class="page-item "><a class="page-link text-dark" href="#">2</a></li>
              <li class="page-item "><a class="page-link text-dark" href="#">3</a></li>
              <li class="page-item "><a class="page-link text-dark" href="#">Next</a></li>
            </ul>
          </nav>
        </div>


      </div>
    </transition>
    </div>
    <div  class="recetaVista" v-bind:class="{ recetaOn: isActive }">
      <div class="imagenPrincipal">
          <img src="/iconos/flecha_izquierda.svg" style="fill:#fff" width="60px" height="60px" v-on:click="isActive = false"></img>
      </div>
      <div class="container" style="position: relative;">
      <div class="row">
      <div class="col-md-5 perfil" style="position:relative; text-align:center;">
        <img src="https://i.imgur.com/J8G70kk.gif" alt="..." class="img-thumbnail img-perfil">
        <p class="lead">Nombre usuario</p>
      </div>


      <div class="col-md-7">
            <h1 class="display-4" style="">Nombre de Receta</h1>
          <hr>
          <small class="text-muted">categoria - origen</small>
          <div class="">
            <p class="lead"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, aperiam!</p>
            <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, dolorem, laborum. Dignissimos expedita magnam totam, reprehenderit vel enim. Delectus debitis, perspiciatis quia iure. Qui saepe dicta, vitae nostrum animi iste! consectetur adipisicing elit. Quidem vel quibusdam voluptas in numquam debitis amet a dolor fuga voluptatem?</p>
            <img src="/iconos/reloj.svg" width="20px" height="20px" alt=""><small style="margin-left:5px;" class="text-muted">1:20 mins</small>
          </div>
          <div class="row" style="margin-top:10px;">
            <div class="col-md-12">
              <ul>
              <li>ingrediente generico</li>
              <li>ingrediente generico</li>
              <li>ingrediente generico</li>
              <li>ingrediente generico</li>
              <li>ingrediente generico</li>
              </ul>
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
  },
  data: function(){
    return(
      {
        isActive: false,
      }
    )
  },
  methods:{
    obtenerId: function(){
      var path = window.location.pathname;
      var segments = path.split("/");
      console.log(segments[2]);
    }
  }

}
</script>

<style scoped>
  .recetaVista{
    position: absolute;
    margin-left: -110%;
    z-index: 2;
    transition: margin-left 2s;
    width: 100%;
    min-height: 92vh;
    top: 0px;
    background-color: #E3E3E3;
  }
  .recetaOn{
    margin-left: 0;
  }
  .imagenPrincipal{
    background-image: url("/media/fotogenerica1.jpeg");
    min-height: 70vh;
    background-repeat: no-repeat, repeat;
    background-position: center center;
    background-size: cover;
    position:relative;
  }
  .perfil{
    position: absolute;
    transform: translateY(-30%);
  }
  .img-perfil{
    width: 15rem;
    height: 15rem;
    background-color: none;
    border: 0px !important;
    border-radius: 7.5rem;
  }



</style>
