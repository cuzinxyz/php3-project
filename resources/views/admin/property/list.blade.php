@extends('admin.layout.app')

@section('heading-title', 'Property Manager')
@section('heading-button') 
<a href="{{ route('property.create') }}" class="btn btn-primary">Add property</a>
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
                        <td>Area</td>
                        <td>Price</td>
                        <td>Address</td>
                        <td>Type</td>
                        <th>Contact</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                        <tr>
                            <td>{{ $property->id }}</td>
                            <td>{{ $property->title }}</td>
                            <td>{{ $property->area }}</td>
                            <td>{{ $property->price }}</td>
                            <td>{{ $property->address }}</td>
                            <td>{{ $property->type_name }}</td>
                            <td>{{ $property->phone_number }}</td>
                            <td><span class="badge bg-primary">{{ $property->status }}</span> </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Action</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
                                      <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <form action="{{ route("property.destroy", $property) }}" method="POST">
                                        <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: -10px; transform: translate3d(67px, 37px, 0px);">
                                            <a class="dropdown-item dropdown-item d-flex align-items-center" href="{{ route('property.edit', $property) }}">
                                                Edit  <i style="font-size:10px" class="fas fa-pen"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>

                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn dropdown-item d-flex align-items-center text-danger">Delete <i style="font-size:10px" class="fas fa-trash-alt"></i>
                                            </button>


                                            @csrf
                                            @method('DELETE')
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
