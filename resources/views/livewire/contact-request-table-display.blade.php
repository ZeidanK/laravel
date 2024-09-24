<div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Resolved</th>
                <th>Date Created</th>
                <th>Date Resolved</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactRequests as $request)
                <tr>
                    <td>{{ $request->name }}</td>
                    <td>{{ $request->email }}</td>
                    <td>{{ $request->phone }}</td>
                    <td>{{ $request->message }}</td>
                    <td>{{ $request->is_resolved ? 'Yes' : 'No' }}</td>
                    <td>{{ $request->created_at }}</td>
                    <td>{{ $request->is_resolved ? $request->resolved_at : 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
