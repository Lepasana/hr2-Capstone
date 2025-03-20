@extends('layouts/layoutMaster')

@section('title', 'Security Service Training Management - Apps')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Learning Management List</span>
    </h4>

    <div class="">
        <div class="card">
            <div class="card-datatable table-responsive">
                <div class="p-5">
                    <form action="{{ route('job-qualification.update', ['id' => $qualification->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="" class="form-label">Job Title</label>
                            <select name="job_request_id" id="job_request_id" class="form-select" required>
                                    <option value="{{ $qualification->job_request_id }}">{{ $qualification->jobRequest->job_title }}</option>
                                @foreach ($jobRequests as $jobRequest)
                                    <option value="{{ $jobRequest->id }}">{{ $jobRequest->job_title }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('job_request_id'))
                                <div class="text-danger">
                                    {{ $errors->first('job_request_id') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">Content</label>
                            <textarea class="form-control" id="content" rows="10" name="content">{{ $qualification->content }}</textarea>


                            @if ($errors->has('content'))
                                <div class="text-danger">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                        </div>

                        <button type="button" id="ai-suggest-btn" class="btn btn-xs btn-secondary">AI Suggest</button>

                        <div class="mt-5">
                            <button type="button" onclick="location.href = '{{ url('/job-qualification') }}'"
                                class="btn btn-secondary">Back</button>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let editor;

        ClassicEditor.create(document.querySelector('#content'))
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error(error);
            });

        document.getElementById('ai-suggest-btn').addEventListener('click', async () => {
            // Get the selected job title
            let jobSelect = document.getElementById('job_request_id');
            let selectedJob = jobSelect.options[jobSelect.selectedIndex].text; // Get selected job title

            if (!selectedJob || selectedJob === "Select") {
                alert("Please select a job first.");
                return;
            }

            let userInput =
                `Generate a structured list of job qualifications for the role of ${selectedJob}. No explanation is needed, just a list of qualifications. Format in HTML and removed the html header to each response. Just start with job title and followed by the <ul><li></li></ul>`;
            let aiButton = document.getElementById('ai-suggest-btn');
            aiButton.innerText = "Generating...";
            aiButton.disabled = true;

            try {
                let response = await fetch('/generate-ai-content', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        prompt: userInput
                    })
                });

                let data = await response.json();
                editor.setData(editor.getData() + "<p>" + data.content + "</p>");
            } catch (error) {
                alert("Failed to generate content. Please try again.");
            }

            // Reset button state
            aiButton.innerText = "AI Suggest";
            aiButton.disabled = false;
        });
    </script>
@endsection
