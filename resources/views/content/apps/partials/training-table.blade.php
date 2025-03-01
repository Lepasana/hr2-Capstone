@foreach ($trainings as $training)
  <tr>
    <td class="text-center">{{ $training->id }}</td>
    <td class="text-start">{{ $training->training_name }}</td>
    <td class="text-start">{{ $training->employee->name }}</td>
    <td class="text-start">{{ $training->training_date }}</td>
    <td class="text-start">{{ $training->duration->title }}</td>
    <td class="text-start">{{ $training->status }}</td>
    <td class="text-start">{{ $training->created_at->format('F d, Y') }}</td>
  </tr>
@endforeach
