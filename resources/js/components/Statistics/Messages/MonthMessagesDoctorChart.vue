<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="container" v-if="monthMessages" style="background: rgba(186, 255, 226, 0.34);">
                    <canvas id="myChartMonth" width="550" height="250"></canvas>
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
                monthMessages:"",
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

                    /* Month */
                    this.monthMessages = response.data.resources.messages.months_message
                    this.monthLabels = response.data.resources.messages.months_message
                    this.dataMonth = response.data.resources.messages.message_count_data
                    /*End Month */

                    
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
            var ctx = document.getElementById('myChartMonth');
            var myChartMonth = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: this.monthLabels,
                    datasets: [{
                        label: 'Messaggi ricevuti',
                        data: this.dataMonth,
                        
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
        }
    }
</script>