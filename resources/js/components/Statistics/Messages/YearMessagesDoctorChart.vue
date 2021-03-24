<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="container" v-if="yearMessages" style="background: rgba(186, 255, 226, 0.34);">
                    <canvas id="myChartYear" width="550" height="300"></canvas>
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
                yearMessages:""
            }
        },
        methods: {

            getData(url){
                return axios.get(url);
            },
            ajaxGetPostMonthlyData: function() {

                let data = '/medico/get-chart';
                
                this.getData(data).then((response) => {
                    console.log(response.data);

                    /* Years */
                    this.yearMessages = response.data.resources.messages.years_message
                    this.yearLabels = response.data.resources.messages.years_message
                    this.dataYears = response.data.resources.messages.years_message_count_data
                    /*End Years */
                    
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
            var ctx = document.getElementById('myChartYear');
            var myChartYear = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: this.yearLabels,
                    datasets: [{
                        label: 'Messaggi ricevuti',
                        data: this.dataYears,
                        
                        backgroundColor: ['#cc65fe','#cc65fe'],
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