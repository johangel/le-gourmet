<template>
  <div class="">
    <main role="main">
    <section class="jumbotron text-center" style="margin-bottom: 0px !important;">
    <div class="container">
    <h1 class="jumbotron-heading">COMPARTE Y APRENDE</h1>
    <p class="lead text-muted">Tenemos todo lo que necesitas para ser un maestro en la cocina, ¡aporta y se parte de nuestra comunidad!</p>
    <p>
    <a href="recipe/create" class="btn btn-primary my-2">Crea tu propia receta</a>
    <a href="receta" class="btn btn-secondary my-2">¿Estas buscando algo?</a>
    </p>
    </div>
    </section>
    <div class="lead display-4 text-center pt-4 bg-light">
      Ultimas recetas agregadas por usuarios
    </div>
    <div class="album py-5 bg-light">
    <div class="container">

    <div class="row">

    <div v-for="recipe in recipes" class="col-md-4">
     <div class="card mb-4 box-shadow">
       <img class="card-img-top" :src="/images/ + recipe.img" alt="Card image cap">  <!--- revisa esto, hijo -->
       <div class="card-body" style="background: #E9ECEF">
         <p class="card-text">{{recipe.description}}</p>
         <div class="d-flex justify-content-between align-items-center">
           <div class="btn-group">
             <button type="button"  class="btn btn-sm btn-dark">Visitar</button>
             <a :href="/User/ +recipe.id"  class="btn btn-sm btn-dark">{{recipe.author}}</a>
           </div>
           <small class="text-muted">{{horaDeCreacion(recipe.created_at)}}</small>
         </div>
       </div>
     </div>
    </div>
    </div>
    </div>
    </div>

    </main>
  </div>
</template>

<script>
import axios from 'axios'
import moment from 'moment'

moment.lang('es');

    export default {
      data (){
        return{
          recipes: []
        }
      },
      created: function(){
        this.getRecipes();
      },
      methods:{
        getRecipes: function(){
          var urlRecipes = 'recipee';
          axios.get(urlRecipes).then(response =>{
            this.recipes = response.data;
          });

        },
        horaDeCreacion: function(d){
          return moment(d).fromNow();
        }
      }

    }
</script>
