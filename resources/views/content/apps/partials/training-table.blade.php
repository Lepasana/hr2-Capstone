@foreach ($trainings as $training)
    @php
        $trainingDate = Carbon\Carbon::parse($training->training_date)->format('F d, Y');

        $completedDate = $training->date_completed
            ? Carbon\Carbon::parse($training->date_completed)->format('F d, Y')
            : null;
    @endphp
    <tr>
        <td class="text-center">{{ $training->id }}</td>
        <td class="text-start">{{ $training->training_name }}</td>
        <td class="text-start">{{ $training->employee->name }}</td>
        <td class="text-start">{{ $trainingDate }}</td>
        <td class="text-start">
            {{ $training->duration?->title && $training->duration?->title != 1 ? $training->duration?->title . ' Days' : $training->duration?->title . ' Day' }}
        </td>
        <td class="text-start">{{ $training->status }}</td>
        <td class="text-start">{{ $completedDate ?? '' }}</td>
        <td>
            <div class="d-flex gap-2">
                <div>
                    <button type="button" class="btn btn-success btn-sm"
                        onclick="location.href = '{{ route('training-management.edit', ['id' => $training->id]) }}'">Edit</button>
                </div>


                <button type="button" class="btn btn-danger btn-sm delete-button"
                    data-action="{{ route('training-management.delete', ['id' => $training->id]) }}">
                    Delete
                </button>
            </div>
        </td>
    </tr>
@endforeach
