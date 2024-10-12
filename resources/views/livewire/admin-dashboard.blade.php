<div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Metric</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Number of Users</td>
                <td>{{ $numberOfUsers }}</td>
            </tr>
            <tr>
                <td>Number of Events</td>
                <td>{{ $numberOfEvents }}</td>
            </tr>
            <tr>
                <td>Number of Contact Requests</td>
                <td>{{ $contactRequests }}</td>
            </tr>
            <tr>
                <td>Number of Pending Events</td>
                <td>{{ $numberOfPendingEvents }}</td>
            </tr>
            <tr>
                <td>Number of Active Events</td>
                <td>{{ $numberOfActiveEvents }}</td>
            </tr>
            <tr>
                <td>Number of Completed Events</td>
                <td>{{ $numberOfCompletedEvents }}</td>
            </tr>
            <tr>
                <td>Number of Cancelled Events</td>
                <td>{{ $numberOfCancelledEvents }}</td>
            </tr>
            <tr>
                <td>Number of New Events</td>
                <td>{{ $numberOfNewEvents }}</td>
            </tr>
        </tbody>
    </table>
</div>
