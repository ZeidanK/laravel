<div style="display: flex;">
    <div style="flex: 1;">
        <canvas id="myPieChart1" width="100" height="100"></canvas> <!-- Adjusted width and height -->
    </div>
    <div style="flex: 1; padding: 20px;">
        <ul id="chartDataList" style="list-style-type: none; padding: 0;">
            <li>
                Attending: {{ $numberOfGuestsAttending }} ({{ number_format(($numberOfGuestsAttending / $numberOfGuests) * 100, 2) }}%)
            </li>
            <li>
                Not Attending: {{ $numberOfGuestsNotAttending }} ({{ number_format(($numberOfGuestsNotAttending / $numberOfGuests) * 100, 2) }}%)
            </li>
            <li>
                Not Responded: {{ $numberOfGuestsNotResponded }} ({{ number_format(($numberOfGuestsNotResponded / $numberOfGuests) * 100, 2) }}%)
            </li>
            <li>
                Total Guests: {{ $numberOfGuests }}
            </li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('myPieChart1').getContext('2d');
        var chartData = @json($chartData); // Pass the PHP data to JavaScript

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: chartData.map(item => item.label),
                datasets: [{
                    data: chartData.map(item => item.value),
                    backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'], // Add colors as needed
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });
</script>

@push('scripts')
    <script src="{{ asset('js/pie-chart.js') }}"></script>
@endpush
