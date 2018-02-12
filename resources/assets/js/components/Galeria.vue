<template>
  <div class="">
    <main role="main">
    <section class="jumbotron text-center" style="margin-bottom: 0px !important;">
    <div class="container">
    <h1 class="jumbotron-heading">Recipes for Food</h1>
    <p class="lead text-muted">Tenemos todo lo que necesitas para ser un maestro en la cocina, ¡ven y unete a nuestra comunidad!</p>
    <p>
    <a href="recipe/create" class="btn btn-primary my-2">Crea tu propia receta</a>
    <a href="#" class="btn btn-secondary my-2">¿Estas buscando algo?</a>
    </p>
    </div>
    </section>

    <div class="album py-5 bg-light">
    <div class="container">

    <div class="row">
    <div v-for="recipe in recipes" class="col-md-4">
     <div class="card mb-4 box-shadow">
       <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail" alt="Card image cap">
       <div class="card-body">
         <p class="card-text">{{recipe.description}}</p>
         <div class="d-flex justify-content-between align-items-center">
           <div class="btn-group">
             <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
             <button type="button" class="btn btn-sm btn-outline-secondary">{{recipe.author}}</button>
           </div>
           <small class="text-muted">9 mins</small>
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

        }
      }
    }
</script>
