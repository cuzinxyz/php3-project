@extends('admin.layout.app')

@section('title', 'Add new category | PH24363')
@section('heading-title', 'Add category')
@section('heading-button')
    <a href="{{ route('blog.create') }}" class="mr-2 btn btn-primary">Add news</a>
    <a href="{{ route('categories.list') }}" class="btn btn-primary">Back</a>
@endsection

@section('content')

    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                <div class="form-group">
                    <label for="type_name">Category Name:</label>
                    <input type="text" class="form-control" id="category_name" name="category_name"
                        placeholder="Enter category name">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter category description"></textarea>
                </div>

                @csrf
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            Category
        </div>
    </div>

@endsection
