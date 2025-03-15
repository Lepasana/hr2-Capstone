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
        <td class="text-start">{{ $training->duration->title }}</td>
        <td class="text-start">{{ $training->status }}</td>
        <td class="text-start">{{ $completedDate }}</td>
        <td class="text-start">
            <div>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#modal-{{ $training->id }}"
                    data-action="{{ route('training-management.delete', ['id' => $training->id]) }}">
                    Delete
                </button>
            </div>

            <x-confirmation-modal action="{{ route('training-management.delete', ['id' => $training->id]) }}"
                title="Confirm Deletion" id="{{ $training->id }}" />
        </td>
    </tr>
@endforeach
