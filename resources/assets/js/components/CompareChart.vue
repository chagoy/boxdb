<script>
	import { Line } from 'vue-chartjs';

	export default {
		extends: Line,
		props: ['anums', 'bnums', 'dates', 'anetwork', 'bnetwork'],

		mounted() {
			this.renderChart({
				labels: this.dates,
				datasets: [
					{
						label: this.anetwork.name,
						backgroundColor: 'rgba(99, 32, 238, .5)',
						pointRadius: 0.7,
						data: this.anums
					},
					{
						label: this.bnetwork.name,
						backgroundColor: 'rgba(52, 89, 149, .5)',
						pointRadius: 0.7, 
						data: this.bnums
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
							max: 5000000
						}
					}]
				}
			})
		}
	}
</script>