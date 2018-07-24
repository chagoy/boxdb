<script>
  import { Line } from 'vue-chartjs';

  export default {
    extends: Line,
    props: ['boxernums', 'alltime', 'totaldates'],

    mounted() {
      this.renderChart({
        labels: this.totaldates,
            datasets: [
              {
                label: 'Average Viewers',
                backgroundColor: 'rgba(0, 107, 166, 0.5)',
                pointRadius: 0.9,
                data: this.boxernums
              },
              {
                label: 'Total Ever Viewers During This Boxer\'s Career',
                backgroundColor: 'rgba(92, 148, 110, 0.5)',
                pointRadius: 0.9,
                data: this.alltime
              }
            ]
      }, {
        scales: {
          xAxes: [{
            type: 'time', 
            time: {
              displayFormats: {
                quarter: 'MMM YYYY'
              }
            }
          }],
          yAxes: [{
            ticks: {
              min: 40000,
              max: 2000000
            },
            // scaleSteps: 5,
            //travis login
            //travis setup heroku
            //git diff
            //heroku create
            
          }]
        },
      })
    }
  }
</script>