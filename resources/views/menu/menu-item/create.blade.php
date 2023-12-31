@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <h1>Menu Group and Menu Item</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Menu Item Management</h2>

            <div class="card" style="border-radius: 15px;">
                <div class="card-header">
                    <h4>Menu Item Create Form</h4>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('menu-item.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Parent</label>
                            <select class="form-control select2" name="menu_group_id">
                                <option value="">Choose Menu Group</option>
                                @foreach ($menuGroups as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('menu_group_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Menu Item Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Menu Item Name" value="{{ old('name') }}"
                                style="border-radius: 15px;">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <input type="text" class="form-control @error('permission_name') is-invalid @enderror"
                                id="permission_name" name="permission_name" placeholder="Permission Name"
                                value="{{ old('permission_name') }}" style="border-radius: 15px;">
                            @error('permission_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Url</label>
                            <select class="form-control select2" name="route">
                                <option value="">Choose Url</option>
                                @foreach ($routeCollection as $item)
                                    <option value="{{ $item->uri() }}">{{ $item->uri() }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('menu-item.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
