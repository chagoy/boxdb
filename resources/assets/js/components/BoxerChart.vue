<script>
  import { Line } from 'vue-chartjs';

  export default {
    extends: Line,
    props: ['views', 'dates', 'totalaverage', 'totaldates', 'boxernums', 'alltime'],

    mounted() {
      this.renderChart({
        labels: this.totaldates,
            datasets: [
              {
                label: 'Average Viewers',
                backgroundColor: 'rgba(0, 107, 166, 0.5)',
                data: this.boxernums
              },
              {
                label: 'Total Ever Viewers During This Boxer\'s Career',
                backgroundColor: 'rgba(92, 148, 110, 0.5)',
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
              min: Math.min(...this.totalaverage),
              max: Math.max(...this.totalaverage)
            }
          }]
        },
      })
    }
  }
</script>