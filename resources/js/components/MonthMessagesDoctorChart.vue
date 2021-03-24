<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="container" v-if="messages">
                    <canvas id="myChart" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {Chart} from 'Chart.js';

    export default {
        data() {
            return {
                messages:""
            }
        },
        methods: {

            getData(url){
                return axios.get(url);
            },
            ajaxGetPostMonthlyData: function() {

                let month = '/medico/get-chart';
                
                this.getData(month).then((response) => {
                    console.log(response.data);
                    this.messages = response.data.months
                    this.labels = response.data.months
                    this.dataProp = response.data.message_count_data
                    
                })
                .catch(error => {
					console.log(error);
			    });
		    },

        },
        mounted() {
            this.ajaxGetPostMonthlyData();
            console.log('Component mounted.')
        },
        updated(){
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: this.labels,
                    datasets: [{
                        label: 'Messaggi ricevuti',
                        data: this.dataProp,
                        
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 4
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }
</script>