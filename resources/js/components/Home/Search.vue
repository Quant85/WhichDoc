<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <!-- <form @submit.prevent="searchResult" >
                        <div class="field has-addons searchbox">
                            <div class="control">
                                <input
                                    class="input"
                                    type="text"
                                    id="search"
                                    name="q"
                                    placeholder="Search..."
                                    @keyup.enter="searchResult"
                                    v-model="searchData"
                                />
                            </div>

                            <div class="control">
                                <button class="button is-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                    <div class="form-group">
                      <label for=""></label>
                      <select class="form-control" name="" id="" v-model="name">
                        <option v-for="spec in special">{{spec}}</option>
                      </select>

                      <a type="submit" class="btn btn-primary" href="/search">Cliccami</a>
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
            name: '',
            special: [],
        };
    },
    mounted() {
        console.log("Component mounted.");
        if (localStorage.name) {
            this.name = localStorage.name;
        }
        console.log('Component mounted.')
            axios.get('api/specializzazioni').then(response => {
                //console.log(response.data);
                const specializzazioni = response.data;
                //console.log(specializzazioni);
                specializzazioni.forEach(spec=>{
                    this.special.push(spec.descrizione);

                })
                console.log(this.special);
        })
    },
    methods: {
        searchResult() {
            window.location.href = `/search?q=${this.searchData}`;
        },
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
        name(newName){
            localStorage.name = newName;
        }
    }
};
</script>
