<script>
	import { Line } from 'vue-chartjs';

	export default {
		extends: Line,
    	props: ['views', 'dates'],

		mounted() {
			this.renderChart({
				labels: this.dates,
			      datasets: [
			        {
			          label: 'Average Viewers',
			          backgroundColor: 'rgba(0, 107, 166, 0.9)',
			          data: this.views
			        }
			      ]
			})
		}
	}
</script>