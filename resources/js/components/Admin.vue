<template>
  <div class="admin-component">
    <form class="mb-3" enctype="multipart/form-data">
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          placeholder="Title"
          v-model="coffee.title"
        />
        
      </div>
      <div class="form-group">
        <input
          type="number"
          class="form-control"
          placeholder="Price"
          v-model="coffee.price"
        />
      </div>
      <div class="form-group">
        <input
          type="file"
          name="image"
          accept="image/*"
          @change="onChange"
        />
      </div>
      <!-- <button type="submit" class="btn btn-primary btn-block">Save</button> -->
      <b-button @click="addCoffee()" variant="primary btn-block">Save</b-button>
      <b-button v-on:click="clearForm()" variant="outline-secondary btn-block">Cancel</b-button>
    </form>

    <div>
      <b-card-group deck>
        <b-card
          img-top
          tag="article"
          style="min-width: 15rem"
          class="mb-2"
          v-for="coffee in coffees"
          v-bind:key="coffee.id"
        >
          <img :src= coffee.path width="150" height="150">
          <h3>{{ coffee.price }} $</h3>

          <b-card-text>
            {{ coffee.title }}
          </b-card-text>

          <button v-on:click="deleteCoffee(coffee.id)" class="btn btn-danger">
            Delete
          </button>
          
        </b-card>
      </b-card-group>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: [],
      coffees: [],
      coffee: {
        id: '',
        title: '',
        path:'',
        price: '',
      },
     
    };
  },
  created() {
 
    this.fetchCoffeeList();
  },
  
  methods: {
    onChange(e){
      
      console.log("labas");
      // if (! e.target.files[0].lenght) return;

            let file = e.target.files[0];

            let reader = new FileReader();
      
            reader.readAsDataURL(file);
            
            reader.onload = e => {
                this.coffee.path = e.target.result;
              //  console.log("Kava"+this.coffee.path);
                
            }
           
             
    },
    fetchCoffeeList() {
      axios.get("http://127.0.0.1:8000/api/prices").then((response) => {
        console.log(response.data);
        this.coffees = response.data;
      });
    },
    deleteCoffee(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/prices/${id}`)
        .then((response) => {
          console.log(response.data);
          this.fetchCoffeeList();
        });
    },
    addCoffee() {
      let data = new FormData()
        data.append("title", this.coffee.title);
        data.append("price", this.coffee.price);
        data.append("path", this.coffee.path);
    
      axios
        .post(`http://127.0.0.1:8000/api/prices`, data )
        .then( (response) => { 
            // console.log(response.data);
        })
        .catch(function (error) {
          console.log(error);
        })
        this.clearForm();
        this.fetchCoffeeList();
    },
    clearForm() {
      this.coffee.title = "", 
      this.coffee.price = "", 
      this.coffee.path = "";
    }

  },
    mounted() {
      console.log("Component mounted.");
    },
 
};
</script>
