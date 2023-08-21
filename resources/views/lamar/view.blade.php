@extends('landing-page.app')

@section('main')
    <main class="bg-light">
        <!-- ... (your other content) ... -->

        <!-- Modal -->
        <div class="modal fade" id="lamarModal" tabindex="-1" role="dialog" aria-labelledby="lamarModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lamarModalLabel">Lamar Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('lamar.apply') }}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $loker->id }}">
                            <!-- ... other form fields ... -->
                            <button type="submit" class="btn btn-primary">Lamar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ... (other content) ... -->
    </main>
@endsection
