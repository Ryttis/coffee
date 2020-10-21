<template>
    <div class="app-component">
             <h1>Coffees</h1>
             <div>
            <b-card-group deck>
             <b-card
                img-alt="Image"
                img-top
                tag="article"
                style="min-width: 15rem;"
                class="mb-2"
                v-for="coffee in coffees" v-bind:key="coffee.id">

                <img :src= coffee.path width="150" height="150">

                <h3>{{coffee.price}} $</h3>
                
                <b-card-text>
                  {{coffee.title}}
                </b-card-text>
                
              </b-card>  
              </b-card-group>
             </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          coffees: [],
          coffee:{
            title:'',
            path:'',
            price:''
          },
          coffee_id:'',
          edit: false
        }
      },
      created(){
        this.fetchCoffeeList()
      },
      methods:{
        fetchCoffeeList(){
          axios.get('http://127.0.0.1:8000/api/prices')
          .then( response => { console.log(response.data)
          this.coffees = response.data 
          })
        }
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
