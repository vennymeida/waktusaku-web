@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <h1>Menu Group and Menu Item</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Menu Group Management</h2>

            <div class="card" style="border-radius: 15px;">
                <div class="card-header">
                    <h4>Edit Menu Group</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('menu-group.update', $menuGroup->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $menuGroup->name) }}" style="border-radius: 15px;">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('menu-group.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
