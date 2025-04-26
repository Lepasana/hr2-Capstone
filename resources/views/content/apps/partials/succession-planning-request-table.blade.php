@foreach ($requests as $request)
    @php
        $status = '';
        match ($request->status) {
            'pending' => ($status = 'bg-secondary text-white'),
            'approved' => ($status = 'bg-success text-white'),
            'rejected' => ($status = 'bg-danger text-white'),
            default => ($status = 'bg-light text-dark'),
        };
    @endphp
    <tr>
        <td class="text-center">{{ $request?->user?->name }}</td>
        <td class="text-start">
            <span class="badge rounded {{ $status }}">
                {{ $request->status }}
            </span>
        </td>
        <td>
            <div class="d-flex gap-2">
                <div>
                    <button type="button" class="btn btn-success btn-sm approve-button"
                        data-action="{{ route('succession-planning.request.approve', ['id' => $request->id]) }}"
                        @disabled(strtolower($request->status) !== 'pending')>
                        Accept</button>
                </div>

                <div>
                    <button type="button" class="btn btn-danger btn-sm reject-button"
                        data-action="{{ route('succession-planning.request.reject', ['id' => $request->id]) }}"
                        @disabled(strtolower($request->status) !== 'pending')>
                        Reject</button>
                </div>
            </div>
        </td>
    </tr>
@endforeach
