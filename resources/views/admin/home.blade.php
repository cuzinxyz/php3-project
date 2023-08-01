@extends('admin.layout.app')

@section('title', 'Website Manager | PH24363')
@section('content')

    <style>.flip-animation {display: flex;justify-content: center;transform: translate3d(0,0,0);}.flip-animation > span {font-size: 6rem;color: #000;animation: flipping 2s infinite;}.flip-animation > span:nth-child(1) {animation-delay: 0.2s;}.flip-animation > span:nth-child(2) {animation-delay: 0.4s;}.flip-animation > span:nth-child(3) {animation-delay: 0.6s;}.flip-animation > span:nth-child(4) {animation-delay: 0.8s;}.flip-animation > span:nth-child(5) {animation-delay: 1s;}.flip-animation > span:nth-child(6) {animation-delay: 1.2s;}@keyframes flipping {0%, 80% {transform: rotateY(360deg);}}</style>

    <div class="row text-center">
        <div class="flip-animation">
            <span>C</span>
            <span>h</span>
            <span>a</span>
            <span>o</span>
            <span>s</span>
            <span>.</span>
          </div>
    </div>

    <hr>

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
