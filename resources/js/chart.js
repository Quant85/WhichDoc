/* Chart - component */
window.Vue = require('vue');


Vue.component('chart-month-messages-component', require('./components/Statistics/Messages/MonthMessagesDoctorChart.vue').default);

Vue.component('chart-years-messages-component', require('./components/Statistics/Messages/YearMessagesDoctorChart.vue').default);

Vue.component('chart-month-retings-component', require('./components/Statistics/Ratings/MonthRatingDoctorChart.vue').default);

Vue.component('chart-years-ratings-component', require('./components/Statistics/Ratings/YearRatingsDoctorChart.vue').default);

Vue.component('chart-month-vote-component', require('./components/Statistics/Ratings/MonthVoteDoctorChart.vue').default);
/*End Chart - component */