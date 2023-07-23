<div>
    <div>
        <canvas id="barChart" width="800" height="400"></canvas>
    </div>
    <script>
        var data = @json($datas);

        // Prepare data for Chart.js
        var labels = Object.keys(data);
        var values = Object.values(data);

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        var colors = [];
        for (var i = 0; i < labels.length; i++) {
            colors.push(getRandomColor());
        }


        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Orders',
                    data: values,
                    backgroundColor: colors, // Use random colors array here
                    borderColor: colors.map(color => color.replace('0.5',
                        '1')), // Add full opacity to border
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 10, // Set the interval to 10
                        suggestedMin: 0, // Set the minimum value for the Y-axis
                    }
                }
            }
        });
    </script>
</div>
