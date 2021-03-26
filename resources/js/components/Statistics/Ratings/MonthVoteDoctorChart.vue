<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="container" v-if="votes" style="background: rgba(186, 255, 226, 0.34);">
                    <canvas id="myChart" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import {Chart} from 'Chart.js';

    export default {
        data() {
            return {
                votes:""
            }
        },
        methods: {

            getData(url){
                return axios.get(url);
            },
            ajaxGetPostMonthlyData: function() {

                let vote = '/medico/get-chart';
                
                this.getData(vote).then((response) => {
                    console.log(response.data.resources.votes.range_vote);
                    this.votes = response.data.resources.votes.range_vote
                    this.labels = response.data.resources.votes.range_vote
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
                        
                        backgroundColor: "rgba(10,22,195,0.2)",
                        borderColor: "rgba(67,142,148,1)",
                        borderWidth: 2,
                        hoverBackgroundColor: "rgba(10,22,195,0.4)",
                        hoverBorderColor: "rgba(67,142,148,1)",
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            stacked: true,
                            gridLines: {
                                display: true,
                                color: "rgba(255,99,132,0.2)"
                            },
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }
            });
            Chart.Bar('chart_0', {
                options: option,
                data: barData
            });
        }
    }
</script>