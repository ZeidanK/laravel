<div style="display: flex;">
    <div style="flex: 1;">
        <canvas id="myPieChart1" width="100" height="100"></canvas> <!-- Adjusted width and height -->
    </div>
    <div style="flex: 1; padding: 20px;">
        <div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ccc; padding: 8px; text-align: left;">الوصف</th>
                        <th style="border: 1px solid #ccc; padding: 8px; text-align: right;">القيمة</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;">الحضور</td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                            {{ $numberOfGuestsAttending }} ({{ number_format(($numberOfGuestsAttending / $numberOfGuests) * 100, 2) }}%)
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;">غير الحضور</td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                            {{ $numberOfGuestsNotAttending }} ({{ number_format(($numberOfGuestsNotAttending / $numberOfGuests) * 100, 2) }}%)
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;">لم يرد</td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                            {{ $numberOfGuestsNotResponded }} ({{ number_format(($numberOfGuestsNotResponded / $numberOfGuests) * 100, 2) }}%)
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;">إجمالي الضيوف</td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                            {{ $numberOfGuests }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;">فتح الرابط</td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                            {{ $numberOfGuestsOpenLink }} ({{ number_format(($numberOfGuestsOpenLink / $numberOfGuests) * 100, 2) }}%)
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;">لم يفتح الرابط</td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                            {{ $numberOfGuestsNotOpenLink }} ({{ number_format(($numberOfGuestsNotOpenLink / $numberOfGuests) * 100, 2) }}%)
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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
