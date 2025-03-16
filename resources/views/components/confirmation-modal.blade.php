@props(['action', 'title' => 'Are you sure?', 'message' => 'You won\'t be able to undo this!', 'confirmText' => 'Yes, Delete'])

<button type="button" class="btn btn-danger btn-sm delete-button" data-action="{{ $action }}"
    data-title="{{ $title }}" data-message="{{ $message }}" data-confirm-text="{{ $confirmText }}">
    Delete
</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                let actionUrl = this.getAttribute('data-action');
                let title = this.getAttribute('data-title');
                let message = this.getAttribute('data-message');
                let confirmText = this.getAttribute('data-confirm-text');

                Swal.fire({
                    title: title,
                    text: message,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: confirmText,
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        let form = document.createElement('form');
                        form.method = 'POST';
                        form.action = actionUrl;
                        form.innerHTML = `
                            @csrf
                            @method('DELETE')
                        `;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    });
</script>
