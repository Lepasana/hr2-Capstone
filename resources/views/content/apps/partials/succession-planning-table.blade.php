@foreach ($successors as $successor)
    <tr>
        <td class="text-center">{{ $successor->employee->id }}</td>
        <td class="text-start">{{ $successor->employee->name }}</td>
        <td class="text-start">{{ $successor->current_position }}</td>
        <td class="text-start">{{ $successor->department }}</td>
        <td class="text-start">{{ $successor->status }}</td>
        <td>
            <div class="d-flex gap-2">
                <div>
                    <button type="button" class="btn btn-success btn-sm"
                        onclick="location.href = '{{ route('succession-planning.edit', ['id' => $successor->id]) }}'">Edit</button>
                </div>

                <div>
                    <button type="button" class="btn btn-danger btn-sm delete-button"
                        data-action="{{ route('succession-planning.delete', ['id' => $successor->id]) }}">
                        Delete
                    </button>
                </div>
            </div>
        </td>
    </tr>
@endforeach
