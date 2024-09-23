console.log('Pie chart script loaded'); // Debug statement

document.addEventListener('livewire:load', function () {
    console.log('Livewire loaded'); // Debug statement

    Livewire.hook('guestPieChartData', function (chartData) {
        console.log('Received chart data:', chartData); // Debug statement

        var ctx = document.getElementById('myPieChart').getContext('2d');
        if (window.myPieChart) {
            window.myPieChart.destroy();
        }
        window.myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: chartData.map(item => item.label),
                datasets: [{
                    data: chartData.map(item => item.value),
                    backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    });
});
