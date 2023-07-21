@extends('admin.layout.app')

@section('title', 'Add new property type | PH24363')
@section('heading-title', 'Add Property Type')
@section('heading-button')
    <a href="{{ route('property.create') }}" class="mr-2 btn btn-primary">Add property</a>
    <a href="{{ route('property-type.list') }}" class="btn btn-primary">Back</a>
@endsection

@section('content')

    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Property Type</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('property-type.store') }}" method="POST">
                <div class="form-group">
                    <label for="type_name">Type Name:</label>
                    <input type="text" class="form-control" id="type_name" name="type_name"
                        placeholder="Enter property type name">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter property type description"></textarea>
                </div>

                @csrf
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            Property Type
        </div>
    </div>




@endsection
