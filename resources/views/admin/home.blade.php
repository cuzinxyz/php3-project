@extends('admin.layout.app')

@section('title', 'Website Manager | PH24363')
@section('content')
    @include('admin.layout.errors')

    <div class="row">
        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('property.list') }}">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-list"></i></span>
                    <div class="info-box-content">
                        <h5>List Property</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('property.create') }}">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-plus"></i></span>
                    <div class="info-box-content">
                        <h5>Create Property</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-3 col-md-4 col-6"></div>
        <div class="col-lg-3 col-md-4 col-6"></div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('property-type.list') }}">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-list"></i></span>
                    <div class="info-box-content">
                        <h5>List Property Type</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('property-type.create') }}">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fas fa-plus"></i></span>
                    <div class="info-box-content">
                        <h5>Create Property Type</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('blog.list') }}">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-list"></i></span>
                    <div class="info-box-content">
                        <h5>List Blog</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('blog.create') }}">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-plus"></i></span>
                    <div class="info-box-content">
                        <h5>Create Blog</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-3 col-md-4 col-6"></div>
        <div class="col-lg-3 col-md-4 col-6"></div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('categories.list') }}">
                <div class="info-box bg-primary">
                    <span class="info-box-icon"><i class="fas fa-list"></i></span>
                    <div class="info-box-content">
                        <h5>List Category</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('categories.create') }}">
                <div class="info-box bg-primary">
                    <span class="info-box-icon"><i class="fas fa-plus"></i></span>
                    <div class="info-box-content">
                        <h5>Create Category</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('banner.list') }}">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-list"></i></span>
                    <div class="info-box-content">
                        <h5>List Banner</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-6">
            <a href="{{ route('banner.create') }}">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-plus"></i></span>
                    <div class="info-box-content">
                        <h5>Create Banner</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
