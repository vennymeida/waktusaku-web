<div class="modal fade" id="lamarModal" tabindex="-1" aria-labelledby="lamarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                @if(auth()->user()->profile && auth()->user()->profile->isComplete())
                    <!-- User Profile is Complete -->
                    <p><strong>Hai, {{ auth()->user()->name }}</strong></p>
                    <p>Data yang lengkap memudahkan Anda dalam melamar pekerjaan dan perusahaan (HRD) tertarik dengan data yang lengkap. Anda akan mendaftar lowongan pekerjaan dengan rincian sebagai berikut :</p>

                    <!-- Card 1: Job Details -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <!-- Image on the left -->
                                <div class="col-md-4">
                                    <img class="img-fluid rounded-circle" src="{{ asset('storage/' . $loker->perusahaan->logo) }}"
                                style="width: 180px; height: 180px; background: linear-gradient(to bottom, rgb(196, 204, 213, 0.2), rgb(196, 204, 213, 0.7));">
                                </div>
                                <!-- Job details on the right -->
                                <div class="col-md-8 job-details-col">
                                    <p class="mb-2 text-primary font-weight-bold" style="font-size: 24px;">{{ $loker->judul }}
                                    </p>
                                    <p class="mb-2" style="font-size: 19px;">{{ $loker->perusahaan->nama }}</p>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><img class="img-fluid img-icon" src="{{ asset('assets/img/landing-page/money.svg') }}">
                                            {{ 'IDR ' . $loker->gaji_bawah }} <span>-</span> {{ $loker->gaji_atas }}
                                        </li>
                                        <li class="mb-2"><img class="img-fluid img-icon" src="{{ asset('assets/img/landing-page/job.svg') }}">
                                            {{ $loker->min_pengalaman }}
                                        </li>
                                        <li class="mb-2"><img class="img-fluid img-icon" src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                            Minimal {{ $loker->min_pendidikan }}
                                        </li>
                                        <li class="mb-2"><img class="img-fluid img-icon" src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                            {{ $loker->lokasi }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Resume Details -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('melamar.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h6 class="mb-3">CV / Resume *</h6>
                                
                                <div class="d-flex flex-column align-items-center">
                                    <!-- Upload Icon (Placeholder, replace with your icon path) -->
                                    <img src="{{ asset('assets/img/lamar/file2.svg') }}" alt="Upload Icon" class="img-fluid img-icon" style="width: 50px; height: 50px;">


                                    <!-- Current Resume Name -->
                                    @if(auth()->user()->profile && auth()->user()->profile->resume)
                                    <span class="mb-2" id="current-resume-name">{{ basename(auth()->user()->profile->resume) }}</span>
                                        <a href="#" onclick="return openResume();" class="btn btn-link mb-2">View Current Resume</a>
                                    @endif

                                    <!-- Upload Instruction -->
                                    <small class="text-muted mb-2">Unggah berkas dalam format PDF (maksimal 2mb)</small>
                                    <button type="button" onclick="document.getElementById('new_resume').click();" class="btn btn-secondary mb-3">Ganti</button>
                                </div>

                                <input type="file" class="form-control-file d-none" name="resume" id="new_resume">
                                <input type="hidden" name="loker_id" value="{{ $loker->id }}">
                                
                                <!-- Lamar Sekarang Button outside of the div to make it span across the card's width -->
                                <button type="submit" class="btn btn-primary btn-block mt-3">Lamar Sekarang</button>
                            </form>
                        </div>
                    </div>

                    @else
                     <!-- User Profile is Incomplete -->
                     <div class="alert alert-warning">
                        Tolong selesaikan profile anda sebelum melamar pekerjaan. 
                        <a href="{{ route('profile.edit') }}" class="alert-link">Click disini untuk menyelesaikan profile anda</a>.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Display Laravel validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>


<script>
    function openResume() {
        window.open("{{ Storage::url(auth()->user()->profile->resume ?? '#') }}", "ResumeWindow", "width=600,height=800");
        return false;
    }

    document.getElementById('new_resume').addEventListener('change', function(e){
        let file = this.files[0];
        let fileSize = file.size / 1024 / 1024; //in mb
        let allowedExtensions = /(\.pdf)$/i;

        if (!allowedExtensions.exec(file.name) || fileSize > 2) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid File',
                text: 'Hanya dokumen berformat PDF yang diizinkan dengan ukuran maksimal 2MB!'
            });
            this.value = ''; // reset the input
            return false;
        }
        
        // Show the file name
        document.getElementById('current-resume-name').textContent = file.name;
    });

    document.addEventListener('DOMContentLoaded', function () {
        let successMessage = "{{ session('success') }}";
        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: successMessage
            });
        }
    });
</script>

<style>
.fixed-height-image {
    max-width: 150px;  /* Adjust this value based on your preferred logo size */
    height: auto;
}

.job-details-col {
    padding-left: 20px;
}

.btn-block {
    display: block;
    width: 100%;
}
</style>

@push('customScript')
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
@endpush