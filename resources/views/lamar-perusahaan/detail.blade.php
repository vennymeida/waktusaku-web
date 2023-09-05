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
                                <p class="mb-2 text-justify" style="font-size: 14px;">{{ $profileUser->ringkasan }}</p>
                                <h5 class="font-weight-bolder">Personal Info </h5>
                                <dl class="row">
                                    <dt class="col-sm-4 mt-2">Email</dt>
                                    <dd class="col-sm-8 mt-2">{{ $email }}</dd>

                                    <dt class="col-sm-4 mt-2">No Telepon</dt>
                                    <dd class="col-sm-8 mt-2">{{ $profileUser->no_hp }}</dd>

                                    <dt class="col-sm-4 mt-2">Alamat</dt>
                                    <dd class="col-sm-8 mt-2">{{ $profileUser->alamat }}</dd>

                                    <dt class="col-sm-4 mt-2">Tanggal Lahir</dt>
                                    <dd class="col-sm-8 mt-2">{{ $profileUser->tgl_lahir }}</dd>

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

                                    <dt class="col-sm-4 mt-2">Harapan Gaji</dt>
                                    <dd class="col-sm-8 mt-2">{{'IDR '. $profileUser->harapan_gaji }}</dd>

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
                                    <dd class="col-sm-8 mt-2">{{ $pendidikan->institusi }}</dd>

                                    <dt class="col-sm-4 mt-2">Gelar</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pendidikan->gelar }}</dd>

                                    <dt class="col-sm-4 mt-2">Jurusan</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pendidikan->jurusan }}</dd>

                                    <dt class="col-sm-4 mt-2">Prestasi</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pendidikan->prestasi }}</dd>

                                    <dt class="col-sm-4 mt-2">IPK</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pendidikan->ipk }}</dd>

                                    <dt class="col-sm-4 mt-2">Periode</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pendidikan->tahun_mulai }}<span> - </span>
                                        {{ $pendidikan->tahun_berakhir }}</dd>
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
                                    <dd class="col-sm-8 mt-2">{{ $pengalaman->nama_pekerjaan }}</dd>

                                    <dt class="col-sm-4 mt-2">Nama Perusahaan</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pengalaman->nama_perusahaan }}</dd>

                                    <dt class="col-sm-4 mt-2">Alamat</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pengalaman->alamat }}</dd>

                                    <dt class="col-sm-4 mt-2">Tipe Pekerjaan</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pengalaman->tipe }}</dd>

                                    <dt class="col-sm-4 mt-2">Gaji</dt>
                                    <dd class="col-sm-8 mt-2">{{'IDR ' . $pengalaman->gaji }}</dd>

                                    <dt class="col-sm-4 mt-2">Periode</dt>
                                    <?php
                                        // Mengambil tanggal mulai dan tanggal berakhir dari kode HTML
                                        $tanggal_mulai = $pengalaman->tanggal_mulai;
                                        $tanggal_berakhir = $pengalaman->tanggal_berakhir;

                                        // Mengubah format tanggal ke "d F Y" (contoh: "4 August 2023")
                                        $tanggal_mulai = date("j F Y", strtotime($tanggal_mulai));
                                        $tanggal_berakhir = date("j F Y", strtotime($tanggal_berakhir));
                                        ?>

                                        <!-- Menampilkan tanggal dalam format yang diubah -->
                                        <dd class="col-sm-8 mt-2"><?= $tanggal_mulai ?><span> - </span><?= $tanggal_berakhir ?></dd>
                                </dl>

                                <hr class="my-4">
                                <h5 class="font-weight-bolder">Pelatihan / Sertifikasi </h5>
                                <dl class="row">
                                    <dt class="col-sm-4 mt-2">Nama Pelatihan</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pelatihan->nama_sertifikat }}</dd>

                                    <dt class="col-sm-4 mt-2">Deskripsi</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pelatihan->deskripsi }}</dd>

                                    <dt class="col-sm-4 mt-2">Dikeluarkan oleh</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pelatihan->penerbit }}</dd>

                                    <dt class="col-sm-4 mt-2">Tanggal Dikeluarkan</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pelatihan->tanggal_dikeluarkan }}</dd>

                                    <dt class="col-sm-4 mt-2">Sertifikat</dt>
                                    <dd class="col-sm-8 mt-2">{{ $pelatihan->sertifikat }}</dd>
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
