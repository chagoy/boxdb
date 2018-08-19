<script>
	import { Line } from 'vue-chartjs';

	export default {
		extends: Line,
    	props: ['networknums', 'alltime', 'totaldates', 'network'],

		mounted() {
			this.renderChart({
				labels: this.totaldates,
			      datasets: [
			        {
			          label: this.network.name,
			          backgroundColor: 'rgba(0, 107, 166, 0.5)',
			          pointRadius: 0.5,
			          data: this.networknums
			        },
			        {
			          label: 'Average Viewers',
			          backgroundColor: 'rgba(92, 148, 110, 0.5)',
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
              max: 5000000
            },
            // scaleSteps: 5,
          }]
        },
      })
		}
	}
</script>