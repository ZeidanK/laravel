<div style="display: flex; border: 1px solid #ccc; padding: 10px; max-width: 100%; max-hight: 70%">
    <div style="flex: 1;">
        <canvas id="myPieChart1" width="80" height="80"></canvas> <!-- Adjusted width and height -->
    </div>
    <div style="flex: 1; padding: 20px;">
        <div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px; background-color: #f9f9f9;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 1.1em;">القيمة</th>
                        <th style="border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 1.1em;">الوصف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 1.1em;">
                            {{ $numberOfGuestsAttending }} (@if($numberOfGuests){{ number_format(($numberOfGuestsAttending / $numberOfGuests) * 100, 0) }}@else 0 @endif%)
                        </td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right; font-size: 1.1em;">الحضور</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 1.1em;">
                            {{ $numberOfGuestsNotAttending }} @if($numberOfGuests)({{ number_format(($numberOfGuestsNotAttending / $numberOfGuests) * 100, 0) }}@else 0 @endif%)
                        </td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right; font-size: 1.1em;">غير الحضور</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 1.1em;">
                            {{ $numberOfGuestsNotResponded }} @if($numberOfGuests)({{ number_format(($numberOfGuestsNotResponded / $numberOfGuests) * 100, 0) }}@else 0 @endif%)
                        </td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right; font-size: 1.1em;">لم يرد</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 1.1em;">
                            {{ $numberOfGuests }}
                        </td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right; font-size: 1.1em;">إجمالي الضيوف</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 1.1em;">
                            {{ $numberOfGuestsOpenLink }} @if($numberOfGuests)({{ number_format(($numberOfGuestsOpenLink / $numberOfGuests) * 100, 0) }}@else 0 @endif%)
                        </td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right; font-size: 1.1em;">فتح الرابط</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center; font-size: 1.1em;">
                            {{ $numberOfGuestsNotOpenLink }} @if($numberOfGuests)({{ number_format(($numberOfGuestsNotOpenLink / $numberOfGuests) * 100, 0) }}@else 0 @endif%)
                        </td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: right; font-size: 1.1em;">لم يفتح الرابط</td>
                    </tr>
                </tbody>
            </table>
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
                    backgroundColor: ['#008000','#FF0000',  '#0000FF'], // Green for attending, Red for not attending, Blue for no response
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
