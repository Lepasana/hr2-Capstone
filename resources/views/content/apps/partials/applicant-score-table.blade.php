@foreach ($applicantScores as $applicantScore)
    <tr>
        <td class="text-center">
            <input type="checkbox" name="applicants[]" class="form-check-input applicant-checkbox"
                value="{{ $applicantScore->id }}" />
        </td>
        <td class="text-center">{{ $applicantScore->id }}</td>
        <td class="text-start">{{ $applicantScore->applicant_id !== null ? $applicantScore->applicant->name : $applicantScore->employee->name }}</td>
        <td class="text-start">{{ $applicantScore->examination?->title }}</td>
        <td class="text-center">{{ $applicantScore->score }}</td>
        <td class="text-center">
            <span class="badge rounded bg-{{ $applicantScore->status == 'passed' ? 'success' : 'danger' }}">
                {{ $applicantScore->status }}
            </span>
        </td>
        <td class="text-center">{{ $applicantScore->duration }}</td>
        <td class="text-center">{{ $applicantScore->created_at->format('F d, Y') }}</td>
    </tr>
@endforeach
