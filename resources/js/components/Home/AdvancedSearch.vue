<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="form-group">
                      <label for=""></label>
                      <select class="form-control" name="" id="" v-model="selected">
                        <option>Medicina dello sport</option>
                        <option>Rosso</option>
                        <option>Giallo</option>
                      </select>
                    </div>
                    <div class="card-body">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
      data(){
        return{
          selected: '',

        }
      },
        mounted() {
            console.log('Component mounted.')
            if (localStorage.name) {
              this.selected = localStorage.name;
            }
            /* this.callApi(); */
      },
      methods: {
        getData(url){
          return axios.get(url);
        },
        callApi: function(){
          let doctors = `${this.currentUrl}`;
          console.log(doctors);

          this.getData(doctors).then(response => {
          console.log(response);
          })
        }
      },
      watch: {
        selected(newSelected){
          localStorage.name = newSelected;
        }
      }
    }
</script>
