@extends('admin.layout.app')

@section('heading-title', 'Property Type Manager')
@section('heading-button') 
<a href="{{ route('property-type.create') }}" class="btn btn-primary">Add type</a>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Properties</h3>
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <td>Title</td>
                        <td>Description</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $index = 1;
                    @endphp

                    @foreach ($types as $type)     
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $type->type_name }}</td>
                            <td>{{ $type->getDescription() }}</td>
                            <td>
                                <form action="{{ route('property-type.destroy', $type) }}" method="POST">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Action</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(67px, 37px, 0px);">
                                            <a class="dropdown-item" href="{{ route('property-type.edit', $type) }}">
                                                Edit  <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn dropdown-item d-flex align-items-center text-danger">Delete <i style="font-size:10px" class="fas fa-trash-alt"></i>
                                            </button>


                                            @csrf
                                            @method('DELETE')
                                            
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
