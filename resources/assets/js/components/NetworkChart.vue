<script>
	import { Line } from 'vue-chartjs';

	export default {
		extends: Line,
    	props: ['networknums', 'alltime', 'totaldates'],

		mounted() {
			this.renderChart({
				labels: this.totaldates,
			      datasets: [
			        {
			          label: 'Average Viewers',
			          backgroundColor: 'rgba(18, 78, 120, 1)',
			          pointRadius: 0.5,
			          data: this.networknums
			        },
			        {
			          label: 'Average Viewers',
			          backgroundColor: 'rgba(100, 157, 116, 0.9)',
			          pointRadius: 0.5,
			          data: this.alltime
			        }
			      ]
			},{
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
          }]
        },
      })
		}
	}
</script>