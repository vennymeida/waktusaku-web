@extends('landing-page.app')

@section('main')
    <main class="bg-light">
        <section>
            <div class="col-md-12 mx-auto mt-4">
                <div class="col-md-10 bg-white mx-auto py-5" style="border-radius: 15px;">
                        <div class="col-md-4 d-flex align-items-start justify-content-center">
                            @if ($profileUser->foto)
                                    <img src="{{ asset('storage/' . $profileUser->foto) }}" alt="Foto"
                                    class="rounded-circle mr-1" style="width: 200px; height: 200px;">
                                @else
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle mr-1" style="width: 200px; height: 200px;">
                                @endif
                        </div>
                        <div class="col-md-7">
                            <ul class="list-unstyled">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <p class="mb-2 text-primary font-weight-bold" style="font-size: 28px;">{{$namaPengguna}}
                                    </p>
                                    <a class="btn btn-secondary px-4" href="{{ route('lamarperusahaan.index') }}"
                                        style="border-radius: 15px;">
                                        Kembali
                                    </a>
                                </ul>
                                <h5 class="font-weight-bolder">Ringkasan </h5>
                                <p class="mb-2" style="font-size: 14px;">Isi Ringkasan</p>
                                <h5 class="font-weight-bolder">Personal Info </h5>
                                <dl class="row">
                                    <dt class="col-sm-4 mt-2">Email</dt>
                                    <dd class="col-sm-8 mt-2">{{ $email }}</dd>

                                    <dt class="col-sm-4 mt-2">No Telepon</dt>
                                    <dd class="col-sm-8 mt-2">{{ $profileUser->no_hp }}</dd>

                                    <dt class="col-sm-4 mt-2">Alamat</dt>
                                    <dd class="col-sm-8 mt-2">{{ $profileUser->alamat }}</dd>

                                    <dt class="col-sm-4 mt-2">Tanggal Lahir</dt>
                                    <dd class="col-sm-8 mt-2"></dd>

                                    <dt class="col-sm-4 mt-2">Jenis Kelamin</dt>
                                    <dd class="col-sm-8 mt-2">{{ $profileUser->jenis_kelamin }}</dd>

                                    <dt class="col-sm-4 mt-2">Gaji</dt>
                                    <dd class="col-sm-8 mt-2"></dd>

                                    <dt class="col-sm-4 mt-2">Resume</dt>
                                    <dd class="col-sm-8 mt-2">
                                    @if ($lamar && $lamar->resume)
                                    <a href="{{ asset('storage/' . $lamar->resume) }}" onclick="return openResume();" target="_blank"
                                        class="btn btn-link mb-2">View Resume</a>
                                    @else
                                    <span class="text-muted">No Resume Available</span>
                                    @endif
                                    </dd>
                                </dl>

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Pendidikan </h5>
                                <p class="mb-2" style="font-size: 14px;">Nama Institusi  </p>
                                <p class="mb-2" style="font-size: 14px;">Gelar </p>
                                <p class="mb-2" style="font-size: 14px;">Jurusan  </p>
                                <p class="mb-2" style="font-size: 14px;">Prestasi </p>
                                <p class="mb-2" style="font-size: 14px;">IPK </p>
                                <p class="mb-2" style="font-size: 14px;">Periode </p>

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Keahlian </h5>
                                <p class="mb-2" style="font-size: 14px;">List Keahlian</p>

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Pengalaman Kerja </h5>
                                <p class="mb-2" style="font-size: 14px;">Nama Pekerjaan  </p>
                                <p class="mb-2" style="font-size: 14px;">Nama Perusahaan </p>
                                <p class="mb-2" style="font-size: 14px;">Alamat  </p>
                                <p class="mb-2" style="font-size: 14px;">Tipe Pekerjaan </p>
                                <p class="mb-2" style="font-size: 14px;">Gaji </p>
                                <p class="mb-2" style="font-size: 14px;">Periode </p>

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Pelatihan / Sertifikasi </h5>
                                <p class="mb-2" style="font-size: 14px;">Nama Pelatihan  </p>
                                <p class="mb-2" style="font-size: 14px;">Deskripsi </p>
                                <p class="mb-2" style="font-size: 14px;">Dikeluarkan oleh  </p>
                                <p class="mb-2" style="font-size: 14px;">Tanggal Dikeluarkan </p>
                                <p class="mb-2" style="font-size: 14px;">Sertifikat </p>
                            </ul>
                            <br>
                            <br>
                            <ul class="list-unstyled d-flex justify-content-between">
                            <form action="{{ route('lamarperusahaan.update', ['lamarperusahaan' => $lamar->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Diterima">
                                <button type="submit" class="btn btn-success px-5 py-2" style="width: 600px; border-radius: 15px;">Terima</button>
                            </form>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-between">
                                <form action="{{ route('lamarperusahaan.update', ['lamarperusahaan' => $lamar->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Ditolak">
                                    <button type="submit" class="btn btn-secondary px-5 py-2" style="width: 600px; border-radius: 15px;">Tolak</button>
                                </form>
                            </ul>
                        </div>

                    </div>
                </div>
        </section>
    </main>

    <script>
        const textarea = document.getElementById('autoSizeTextarea');

        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        textarea.style.height = (textarea.scrollHeight) + 'px';
    </script>
@endsection
