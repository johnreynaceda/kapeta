<div>
    <div style=" margin: 0 auto;">
        <canvas id="salesChart" width="400" height="200"></canvas>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            // Convert PHP array to JavaScript object
            var chartData = @json($datas);

            // Get the labels (dates) and data (sum of total_amount) from the chartData
            var labels = chartData.map(function(item) {
                return item.date;
            });

            var data = chartData.map(function(item) {
                return item.sum;
            });

            // Create a new Chart.js bar chart
            new Chart(document.getElementById('salesChart'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Sales',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>
