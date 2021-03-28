<template>
    <div class="container">
        <select v-model="selected">
            <option v-for="spec in special">{{spec}}</option>
        </select>
        <form action="">
            <input type="radio" id="max" name="somma" @change='max'>
            <label for="max">+30voti</label>
            <input type="radio" id="mid" name="somma" @change='mid'>
            <label for="mid">tra 10 e 30voti</label>
            <input type="radio" id="min" name="somma" @change='min'>
            <label for="min">tra 0 e 10voti</label>
            <input type="radio" id="all" name="somma" @change='all'>
            <label for="all">tutti</label>
        </form>
        <form action="">
            <input type="radio" id="zero" name="media" @change='zero'>
            <label for="zero">media voto 0</label>
            <input type="radio" id="uno" name="media" @change='uno'>
            <label for="uno">media voto 1</label>
            <input type="radio" id="due" name="media" @change='due'>
            <label for="due">media voto 2</label>
            <input type="radio" id="tre" name="media" @change='tre'>
            <label for="tre">media voto 3</label>
            <input type="radio" id="quattro" name="media" @change='quattro'>
            <label for="quattro">media voto 4</label>
            <input type="radio" id="cinque" name="media" @change='cinque'>
            <label for="cinque">media voto 5</label>
        </form>

        <div v-for="doctor in doctors">
            <!-- <div class="card" v-if="selected == doctor.specializzazioni && doctor.visible == true"> -->
            <a :href="`/medico/profilo/` + doctor.id">
                <div class="card"  v-if="selected == doctor.specializzazioni && doctor.visible == true && doctor.visibleMV == true && doctor.profilo !== null">
                    <div class="immagine_dottore_ricerca">
                        <img :src="`storage/${doctor.profilo.foto}`" alt="" style="width: 100px;">
                    </div>
                    <h4 v-if="doctor.profilo.genere == 'maschio'">Dottore <br>{{doctor.nome}} {{doctor.cognome}}</h4>
                    <h4 v-else-if="doctor.profilo.genere == 'femmina'">Dottoressa <br>{{doctor.nome}} {{doctor.cognome}}</h4>
                    <p v-for="speci in doctor.somma_specializzazioni">{{speci.descrizione}}</p>
                    <p>{{doctor.profilo.città}}</p>
                    <p>{{doctor.media_voto}}</p>
                    <p>{{doctor.somma_recensione}}</p>

                </div>
            </a>
        </div>
        
    </div>
</template>

<script>
    export default {
      data(){
        return{
            selected: '',
            doctors: [],
            special: [],
            
        }
      },
        mounted() {
         console.log('Component mounted.')
            axios.get('api/doctors').then(response => {
                //console.log(response.data.data);
                const dati = response.data.data;
                // this.doctors = dati;
                //console.log(this.doctors);
                dati.forEach(el=>{
                    const spec = el.specializzazioni
                    //console.log(el);
                    spec.forEach(element=>{
                    //console.log(element);
                        this.doctors.push({
                        id:el.id,
                        nome:el.nome,
                        cognome:el.cognome,
                        genere:el.genere,
                        email:el.email,
                        indirizzo:el.indirizzo,
                        prestazioni:el.prestazioni,
                        visible: true,
                        visibleMV: true,
                        somma_specializzazioni: el.specializzazioni,
                        specializzazioni:element.descrizione,
                        somma_recensione: el.somma_recensione,
                        media_voto: el.media_voto,
                        profilo: el.profilo,
                        })
                    })
                    console.log(this.doctors);
                })
            })
            console.log('Component mounted.')
            axios.get('api/specializzazioni').then(response => {
                //console.log(response.data);
                const specializzazioni = response.data;
                //console.log(specializzazioni);
                specializzazioni.forEach(spec=>{
                    this.special.push(spec.descrizione);

                })
                //console.log(this.special);
            })

            if (localStorage.name) this.selected = localStorage.name;
      },
  methods: {
    max(){
        this.doctors.forEach(element =>{
            if (element.somma_recensione > 30) {
                //console.log(element.somma_recensione);
                element.visible = true
            }else
                element.visible = false

        })
    }, 
    mid(){
        this.doctors.forEach(element =>{
            if (element.somma_recensione > 10 && element.somma_recensione <= 30) {
                element.visible = true
            }else
                element.visible = false

        })
    },       
    min(){
        this.doctors.forEach(element =>{
            if (element.somma_recensione >= 0 && element.somma_recensione <= 10) {
                element.visible = true
            }else
                element.visible = false

        })
    }, 
                  
    all(){
        this.doctors.forEach(element =>{
            if (element.somma_recensione >= 0) {
                
                element.visible = true
            }
            

        })
    },
          
    zero(){
        this.doctors.forEach(element =>{
            if (element.media_voto < 0.5) {
                //console.log(element.media_voto);
                element.visibleMV = true
            }else
                element.visibleMV = false

        })
    }, 
    uno(){
        this.doctors.forEach(element =>{
            if (element.media_voto >= 0.5 && element.media_voto < 1.5) {
                element.visibleMV = true
            }else
                element.visibleMV = false

        })
    },       
    due(){
        this.doctors.forEach(element =>{
            if (element.media_voto >= 1.5 && element.media_voto < 2.5) {
                element.visibleMV = true
            }else
                element.visibleMV = false

        })
    }, 
                  
    tre(){
        this.doctors.forEach(element =>{
            if (element.media_voto >= 2.5 && element.media_voto < 3.5) {
                
                element.visibleMV = true
            }else
                element.visibleMV = false
        })
    },
    
    quattro(){
        this.doctors.forEach(element =>{
            if (element.media_voto >= 3.5 && element.media_voto < 4.5) {
                element.visibleMV = true
            }else
                element.visibleMV = false

        })
    }, 
                  
    cinque(){
        this.doctors.forEach(element =>{
            if (element.media_voto > 4.5) {
                
                element.visibleMV = true
            }else
                element.visibleMV = false
        })
    }, 
  },
      watch: {
        selected(newSelected){
          localStorage.name = newSelected;
        }
      }
    }
</script>
