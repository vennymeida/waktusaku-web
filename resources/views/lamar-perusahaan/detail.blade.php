@extends('landing-page.app')

@section('main')
    <main class="bg-light">
        <section>
            <div class="col-md-12 mx-auto mt-4">
                <div class="col-md-10 bg-white mx-auto py-5" style="border-radius: 15px;">
                    <div class="col-md-12 d-flex align-items-start justify-content-start">
                        @if ($profileUser->foto)
                            <img src="{{ asset('storage/' . $profileUser->foto) }}" alt="Foto" class="rounded-circle mx-5"
                                style="width: 200px; height: 200px;">
                        @else
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mx-5" style="width: 200px; height: 200px;">
                        @endif
                        <div class="col-md-8">
                            <ul class="list-unstyled">
                                <ul class="list-unstyled d-flex justify-content-between align-items-end">
                                    <p class="mb-2 text-primary font-weight-bold" style="font-size: 28px;">
                                        {{ $namaPengguna }}
                                    </p>
                                    <a class="btn btn-secondary px-4 text-right" href="{{ route('lamarperusahaan.index') }}"
                                        style="border-radius: 15px;">
                                        Kembali
                                    </a>
                                </ul>
                                <h5 class="font-weight-bolder">Ringkasan </h5>
                                <p class="mb-2 text-justify" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias maxime, iure nostrum laboriosam eaque aspernatur sapiente ratione id autem, voluptatem dignissimos, ex quisquam mollitia deleniti cupiditate ut illum quam iste culpa provident dicta nisi magni. Iste laudantium aliquam saepe perferendis, beatae qui! Tempora quisquam ullam animi consequatur deleniti ex. Voluptatibus!</p>
                                <h5 class="font-weight-bolder">Personal Info </h5>
                                <dl class="row">
                                    <dt class="col-sm-4 mt-2">Email</dt>
                                    <dd class="col-sm-8 mt-2">{{ $email }}</dd>

                                    <dt class="col-sm-4 mt-2">No Telepon</dt>
                                    <dd class="col-sm-8 mt-2">{{ $profileUser->no_hp }}</dd>

                                    <dt class="col-sm-4 mt-2">Alamat</dt>
                                    <dd class="col-sm-8 mt-2">{{ $profileUser->alamat }}</dd>

                                    <dt class="col-sm-4 mt-2">Tanggal Lahir</dt>
                                    <dd class="col-sm-8 mt-2">2 Mei 2002</dd>

                                    <dt class="col-sm-4 mt-2">Jenis Kelamin</dt>
                                    <dd class="col-sm-8 mt-2">
                                        @if ($profileUser->jenis_kelamin === 'P')
                                            Perempuan
                                        @elseif ($profileUser->jenis_kelamin === 'L')
                                            Laki-laki
                                        @else
                                            Tidak Diketahui
                                        @endif
                                    </dd>

                                    <dt class="col-sm-4 mt-2">Gaji</dt>
                                    <dd class="col-sm-8 mt-2"></dd>

                                    <dt class="col-sm-4 mt-2">Resume</dt>
                                    <dd class="col-sm-8 mt-2">
                                        @if ($lamar && $lamar->resume)
                                            <a href="{{ asset('storage/' . $lamar->resume) }}"
                                                onclick="return openResume();" target="_blank" class="mb-2">
                                                {{ basename($lamar->resume) }}
                                            </a>
                                        @else
                                            <span class="text-muted">No Resume Available</span>
                                        @endif
                                    </dd>
                                </dl>

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Pendidikan </h5>
                                <dl class="row">
                                    <dt class="col-sm-4 mt-2">Nama Institusi</dt>
                                    <dd class="col-sm-8 mt-2">Politeknik Negeri Malang</dd>

                                    <dt class="col-sm-4 mt-2">Gelar</dt>
                                    <dd class="col-sm-8 mt-2">S1</dd>

                                    <dt class="col-sm-4 mt-2">Jurusan</dt>
                                    <dd class="col-sm-8 mt-2">Teknologi Informasi</dd>

                                    <dt class="col-sm-4 mt-2">Prestasi</dt>
                                    <dd class="col-sm-8 mt-2">Pemain Sepak Bola</dd>

                                    <dt class="col-sm-4 mt-2">IPK</dt>
                                    <dd class="col-sm-8 mt-2">3,91</dd>

                                    <dt class="col-sm-4 mt-2">Periode</dt>
                                    <dd class="col-sm-8 mt-2">2020 - 2023</dd>
                                </dl>

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Keahlian</h5>
                                {{-- @foreach ($loker->keahlian as $key => $keahlian) --}}
                                    <button class="px-4 mt-2 mr-1 btn btn-skill">Laravel</button>
                                    <button class="px-4 mt-2 mr-1 btn btn-skill">PHP</button>
                                    <button class="px-4 mt-2 mr-1 btn btn-skill">Javascript</button>
                                {{-- @endforeach --}}

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Pengalaman Kerja </h5>
                                <dl class="row">
                                    <dt class="col-sm-4 mt-2">Nama Pekerjaan</dt>
                                    <dd class="col-sm-8 mt-2">Web Developer</dd>

                                    <dt class="col-sm-4 mt-2">Nama Perusahaan</dt>
                                    <dd class="col-sm-8 mt-2">PT Hummasoft</dd>

                                    <dt class="col-sm-4 mt-2">Alamat</dt>
                                    <dd class="col-sm-8 mt-2">Jl Ngijo Karangploso</dd>

                                    <dt class="col-sm-4 mt-2">Tipe Pekerjaan</dt>
                                    <dd class="col-sm-8 mt-2">Remote</dd>

                                    <dt class="col-sm-4 mt-2">Gaji</dt>
                                    <dd class="col-sm-8 mt-2">-</dd>

                                    <dt class="col-sm-4 mt-2">Periode</dt>
                                    <dd class="col-sm-8 mt-2">2023 - sekarang</dd>
                                </dl>

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Pelatihan / Sertifikasi </h5>
                                <dl class="row">
                                    <dt class="col-sm-4 mt-2">Nama Pelatihan</dt>
                                    <dd class="col-sm-8 mt-2">VSGA</dd>

                                    <dt class="col-sm-4 mt-2">Deskripsi</dt>
                                    <dd class="col-sm-8 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis aliquid pariatur repellendus non voluptatem quam fugiat neque ipsum exercitationem odit.</dd>

                                    <dt class="col-sm-4 mt-2">Dikeluarkan oleh</dt>
                                    <dd class="col-sm-8 mt-2">Dicoding Indonesia</dd>

                                    <dt class="col-sm-4 mt-2">Tanggal Dikeluarkan</dt>
                                    <dd class="col-sm-8 mt-2">2023</dd>

                                    <dt class="col-sm-4 mt-2">Sertifikat</dt>
                                    <dd class="col-sm-8 mt-2">sertifikat.pdf</dd>
                                </dl>
                            </ul>
                            <br>
                            <br>
                            <form action="{{ route('lamarperusahaan.update', ['lamarperusahaan' => $lamar->id]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Diterima">
                                <button type="submit" class="btn btn-success btn-block px-5 py-2 mb-3"
                                    style="border-radius: 15px;">Terima</button>
                            </form>
                            <form action="{{ route('lamarperusahaan.update', ['lamarperusahaan' => $lamar->id]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Ditolak">
                                <button type="submit" class="btn btn-secondary btn-block px-5 py-2"
                                    style="border-radius: 15px;">Tolak</button>
                            </form>
                        </div>
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
