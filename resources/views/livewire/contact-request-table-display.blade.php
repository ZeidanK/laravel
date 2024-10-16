<div>
    <!-- Filter Form -->
    <form wire:submit.prevent="filter">
        <div class="form-row">
            <div class="col">
                <input type="text" wire:model="search.name" class="form-control" placeholder="Name">
            </div>
            <div class="col">
                <input type="email" wire:model="search.email" class="form-control" placeholder="Email">
            </div>
            <div class="col">
                <input type="text" wire:model="search.phone" class="form-control" placeholder="Phone">
            </div>
            <div class="col">
                <select wire:model="search.is_resolved" class="form-control">
                    <option value="">Resolved Status</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Display Contact Requests -->
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Resolved</th>
                <th>Resolved At</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactRequests as $contactRequest)
                <tr>
                    <td>{{ $contactRequest->name }}</td>
                    <td>{{ $contactRequest->email }}</td>
                    <td>{{ $contactRequest->phone_number }}</td>
                    <td>{{ $contactRequest->message }}</td>
                    <td>{{ $contactRequest->is_resolved ? 'Yes' : 'No' }}</td>
                    <td>{{ $contactRequest->resolved_at }}</td>
                    <td>{{ $contactRequest->ip_address }}</td>
                    <td>{{ $contactRequest->user_agent }}</td>
                    <td>
                        <button wire:click="resolveContactRequest({{ $contactRequest->id }})" class="btn btn-success">Resolve</button>
                        <button wire:click="deleteContactRequest({{ $contactRequest->id }})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
