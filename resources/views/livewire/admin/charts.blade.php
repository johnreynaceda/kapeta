<div>
    <div>
        <canvas id="barChart" width="400" height="200"></canvas>

    </div>

    <script>
        // Get data from PHP
        var productLabels = @json($productLabels);
        var totalSoldData = @json($totalSoldData);

        $backgroundColor = ['#546FC6', '#91CD77', '#FBC958'];
        // Create a bar chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: productLabels,
                datasets: [{
                    label: 'Total Sold Products',
                    data: totalSoldData,
                    backgroundColor: $backgroundColor,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</div>
