<template lang="html">
  <div class="container">
    <div class="row">
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
                  <a href="#" class="btn btn-dark">Ver receta</a>
              </div>
          </div>
          <div class="card" style="width:30rem; margin-bottom:20px;">
              <img class="card-img-top" src="/media/fotogenerica1.jpeg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Burrito poderoso</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dolorum in illum magnam debitis quos amet dignissimos, distinctio eius sint.</p>
                  <a href="#" class="btn btn-dark">Ver receta</a>
              </div>
          </div>
          <div class="card" style="width:30rem;  margin-bottom:20px;">
              <img class="card-img-top" src="/media/fotogenerica1.jpeg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Burrito poderoso</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dolorum in illum magnam debitis quos amet dignissimos, distinctio eius sint.</p>
                  <a href="#" class="btn btn-dark">Ver receta</a>
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
    </div>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">


</style>
