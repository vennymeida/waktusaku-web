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
                            <div class="profile-widget-name mt-2 ml-3">Aktivitas Saya</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="centered-section">
            <div class="bg-primary-section col-md-10 py-1">
                <div class="profile-widget-description m-3"
                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                    <div class="flex-grow-1">
                        <div class="profile-widget-name">Activity / Postingan</div>
                    </div>
                    <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                        <a href="#" data-toggle="modal" data-target="#modal-edit-postingan">
                            <img class="img-fluid" style="width: 35px; height: 35px;"
                                src="{{ asset('assets/img/landing-page/Plus.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="postingan-container">
                    <div class="col-md-12">
                        @foreach ($postingan as $post)
                            <div class="media mb-2">
                                <img class="mr-3 rounded"width="100" height="100"
                                    src="{{ asset('storage/' . $post->media) }}">
                                <div class="media-body">
                                    {!! $post->konteks !!}
                                </div>
                                <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                                    <a href="#" data-id="{{ $post->id }}"
                                        data-edit-url="{{ route('postingan.edit', ['postingan' => $post->id]) }}"
                                        class="modal-edit-trigger-postingan">
                                        <img class="img-fluid" style="width: 30px; height: 30px;"
                                            src="{{ asset('assets/img/landing-page/edit-pencil.svg') }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal Edit Postingan -->
    <div class="modal fade" id="modal-edit-postingan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header m-4">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #6777ef; font-weight: bold;">Edit
                        Postingan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="modal-edit-postingan-form" class="needs-validation" novalidate=""
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Untuk menentukan bahwa ini adalah permintaan PUT -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <!-- Informasi Nama User dan Profile -->
                                    <div class="media mb-4">
                                        <!-- Tampilkan informasi pengguna -->
                                    </div>
                                    <div class="form-group">
                                        <label for="konteks">Konten Postingan</label>
                                        <textarea name="konteks" id="konteks" class="form-control summernote @error('konteks') is-invalid @enderror"
                                            type="text" required></textarea>
                                        @error('konteks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <!-- Gunakan label untuk mengaktifkan input file -->
                                                <label for="mediaUploadButton" style="cursor: pointer;">
                                                    <img class="img-fluid" src="{{ asset('assets/img/Gallery Add.svg') }}">
                                                    &nbsp;&nbsp;&nbsp; Media
                                                </label>
                                                <!-- Input file tersembunyi -->
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
                    <button type="button" class="btn btn-primary" onclick="$('form', this.closest('.modal')).submit();"
                        style="border-radius: 15px; font-size: 14px">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        style="border-radius: 15px; font-size: 14px">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customScript')
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    <script>
        $(document).ready(function() {
            var editModal = $('#modal-edit-postingan');

            function openEditModal(postId) {
                var editUrl = "{{ route('postingan.edit', ['postingan' => '_id']) }}".replace('_id', postId);
                var updateUrl = "{{ route('postingan.update', ['postingan' => '_id']) }}".replace('_id', postId);

                $('#modal-edit-postingan-form').attr('action', updateUrl);

                $.ajax({
                    url: editUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Isi form dalam modal dengan data yang diambil dari server
                        $('#modal-edit-postingan-form input[name="konteks"]').val(data.konteks);
                        $('#modal-edit-postingan-form input[name="media"]').val(data.media);

                        editModal.modal('show');
                    }
                });
            }

            $('#postingan-container').on('click', '.modal-edit-trigger-postingan', function() {
                var postId = $(this).data('id');
                openEditModal(postId);
            });

            $('#modal-save-button-postingan').on('click', function() {
                var form = $('#modal-edit-postingan-form');
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
                            editModal.modal('hide');
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
