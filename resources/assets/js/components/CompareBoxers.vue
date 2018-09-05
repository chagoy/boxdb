<script>
	import { Bar } from 'vue-chartjs';

	export default {
		extends: Bar,
		props: ['asidenums', 'bsidenums', 'dates', 'aside', 'bside', 'asidebar', 'asidedates'],

		computed: {
			max : {
				get: function() {
					let combine = [...this.asidenums, ...this.bsidenums];

					return combine.map(boxNum => boxNum.y).sort((a, b) => a - b)[combine.length - 1];
				}
			},
			min: {
				get: function() {
					let combine = [...this.asidenums, ...this.bsidenums];

					return combine.map(boxNum => boxNum.y).sort((a, b) => a - b)[0] - 50000;
				}
			}
		},

		mounted() {
			this.renderChart({
				labels: this.asidedates,
				datasets: [
					{
						label: `${this.aside.first_name} ${this.aside.last_name}`,
						backgroundColor: 'rgba(17, 46, 120, 0.29)',
						// pointRadius: 0.7,
						data: this.asidebar
					},
					{
						type: 'line',
						label: `${this.bside.first_name} ${this.bside.last_name}`,
						backgroundColor: 'rgba(227, 43, 43, 0.5)',
						pointRadius: 0.7, 
						data: this.bsidenums
					}
				]
			}, {
				// scales: {
				// 	xAxes: [{
				// 		type: 'time', 
				// 		time: {
				// 			displayFormats: {
				// 				quarter: 'MMM YYYY'
				// 			}
				// 		}
				// 	}],
				// 	yAxes: [{
				// 		ticks: {
				// 			min: this.min, 
				// 			max: this.max
				// 		}
				// 	}]
				// }
			})
		}
	}
</script>