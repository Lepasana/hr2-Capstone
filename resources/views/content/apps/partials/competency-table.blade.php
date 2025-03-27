@foreach ($competencies as $competency)
    <tr>
        <td class="text-center">{{ $competency->employee->id }}</td>
        <td class="text-center">{{ $competency->employee->name }}</td>
        <td class="text-center">{{ $competency->jobPosition->title }}</td>
        <td class="text-center">{{ $competency->department }}</td>
        <td class="text-center">{{ $competency->skill_level }}</td>
        <td>
            <div class="d-flex gap-2">
                <div>
                    <button type="button" class="btn btn-success btn-sm"
                        onclick="location.href = '{{ route('competency-management.edit', ['id' => $competency->id]) }}'">Edit</button>
                </div>

                <div>
                    <button type="button" class="btn btn-danger btn-sm delete-button"
                        data-action="{{ route('competency-management.delete', ['id' => $competency->id]) }}">
                        Delete
                    </button>
                </div>
            </div>
        </td>
    </tr>
@endforeach
