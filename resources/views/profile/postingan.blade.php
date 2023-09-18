@extends('landing-page.app')
@section('main')
    <main class="bg-secondary">
        <section class="centered-section">
            <div class="bg-primary-section col-md-10 py-1">
                <div class="profile-widget-description m-3"
                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center; color:#6777ef">
                    <div class="flex-grow-1">
                        <div class="row">
                            <div>
                                <a href="{{ url('/profile') }}">
                                    <img class="img-fluid mt-1" style="width: 30px; height: 30px;"
                                        src="{{ asset('assets/img/Vector.svg') }}">
                                </a>
                            </div>
                            <div class="profile-widget-name mt-2 ml-3">List Data Postingan</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if (count($postingan) > 0)
            @foreach ($postingan as $item)
                <section class="centered-section">
                    <div class="bg-primary-section col-md-10 py-1">
                        <div class="col-md-12">
                            <div class="media mb-2">
                                <img class="mr-3 rounded"width="100" height="100"
                                    src="{{ asset('storage/' . $item->media) }}">
                                <div class="media-body">
                                    {!! $item->konteks !!}
                                </div>
                                <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                                    <a href="#" data-id="{{ $item->id }}"
                                        data-edit-url="{{ route('postingan.edit', ['postingan' => $item->id]) }}"
                                        class="modal-edit-trigger">
                                        <img class="img-fluid" style="width: 30px; height: 30px;"
                                            src="{{ asset('assets/img/landing-page/edit-pencil.svg') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        @endif
    </main>

    <!-- Modal Edit Postingan -->
    <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg mx-auto" role="document">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header m-4">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #6777ef; font-weight: bold;">Edit
                            Postingan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="modal-edit-form" class="needs-validation" novalidate=""
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <div class="media mb-4">
                                        </div>
                                        <div class="form-group">
                                            <label for="konteks">Konten Postingan</label>
                                            <textarea name="konteks" id="konteks" class="form-control summernote @error('konteks') is-invalid @enderror"
                                                type="text" value="{{ old('konteks') }}" required></textarea>
                                            @error('konteks')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <ul class="list-unstyled">
                                                <li class="mb-2">
                                                    <label for="mediaUploadButton" style="cursor: pointer;">
                                                        <img class="img-fluid"
                                                            src="{{ asset('assets/img/Gallery Add.svg') }}">
                                                        &nbsp;&nbsp;&nbsp; Media
                                                    </label>
                                                    <input type="file" id="mediaUploadButton" class="d-none"
                                                        accept="image/*, video/*">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-whitesmoke m-4">
                        <button type="button" class="btn btn-primary" id="modal-save-button"
                            style="border-radius: 15px; font-size: 14px">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="border-radius: 15px; font-size: 14px">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.modal-edit-trigger').on('click', function() {
                var itemId = $(this).data('id');
                var editUrl = "{{ route('postingan.edit', ['postingan' => '_id']) }}".replace('_id',
                    itemId);
                var updateUrl = "{{ route('postingan.update', ['postingan' => '_id']) }}".replace('_id',
                    itemId);
                $('#modal-edit-form').attr('action', updateUrl);

                $.ajax({
                    url: editUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#modal-edit input[name="konteks"]').val(data.konteks);
                        $('#modal-edit input[name="media"]').val(data.media);

                        $('#modal-edit').modal('show');
                    }
                });
            });

            $('#modal-save-button').on('click', function() {
                var form = $('#modal-edit-form');
                var formData = new FormData(form[0]);
                formData.append('_token', "{{ csrf_token() }}");

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            $('#modal-edit').modal('hide');
                            location.reload();
                        } else {
                            alert('Error! ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Error while updating data!');
                    }
                });
            });
        });
    </script>
@endpush
@push('customStyle')
@endpush
