<template>
  <div class="container">

    <div class="row mt-5">
      <div class="col">
        <h1 class="text-center"></h1>
      </div>
    </div>

    <div class="row mt-5" v-if="arrQuestionData.length > 0" v-for="(question, key) in arrQuestionData" :key="key">
      <div class="col">
        <h2 class="text-center">{{question.question}}</h2>
        <line-chart
          :chartData="question.ratings"
          :options="chartOptions"
          :chartColors="positiveChartColors"
          label="Percentage %"
        />
      </div>
    </div>

  </div>
</template>

<script>

// import axios from "axios";
// import moment from "moment";

import LineChart from "./LineChart.vue";

export default {

  components: {
    LineChart
  },

  data() {

    return {
      // Stores all chart data 
     arrQuestionData: [],

     formId: '',
     formName: '',
          
     positiveChartColors: {
        borderColor: "#077187",
        pointBorderColor: "#0E1428",
        pointBackgroundColor: "#AFD6AC",
        backgroundColor: "#74A57F"
      },

      chartOptions: {
        responsive: true,
        maintainAspectRatio: false
      },

         dataZoHasi: ['','worst', 'bad', 'fair', 'good', 'best']

    };
  },

  async created() {

    this.formId = this.$route.params.id;	 
    
			  
		console.log('73300 >>> formId: ' + this.formId);	

    const { data } = await axios.get('http://127.0.0.1:8000/summaryCharts/'+this.formId);

    // console.log(" 345 >>> "+ this.formName );    
  
    data.forEach(d => {

      // Format individual question

      var arrRatingsData = [];
      d.forEach((item, key) => {

        //key (or index) = from 0 to 11 = columns order

        //item = in this particular case it's the "percentage" or otherwise any other related content in rows of the sent array converted into jason

        //item (from the second row to the last one and for index 1 to 10) = percentage

        console.log("812 >>> item: " + item + " >>> key: " + key);

        if(key != 0 && key != 6){
          
          //date niyo ijya kuri axe des x

          //total niyo ijya kuri axe des y

          arrRatingsData.push({date: this.dataZoHasi[key], total: item});

        }
        
      }) 

       console.log(" 951 >>> d0: "+ d[0]);

      //  d[0] = enonce de la question

      //  d[11] = "average" de la question

      this.arrQuestionData.push({question: d[0] + " (average: " + d[6] + "/5) ", ratings: arrRatingsData})
 
    });

      this.arrQuestionData.shift();

  }
};

</script>

<style>
</style>

