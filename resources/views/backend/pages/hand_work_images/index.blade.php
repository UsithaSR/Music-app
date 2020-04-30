@extends('backend.layouts.app', [
    'namePage' => 'Hand Work Images',
    'class' => 'sidebar-mini',
    'activePage' => 'hand_work_image',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Hand Work Images List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.hand_work_images.create') }}">
                                <button class="btn btn-primary">Create</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Image</th>
                                <th>Hand Work Title</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($hand_work_images as $hand_work_image)
                                    <tr>
                                        <td>{{ $hand_work_image->id }}</td>
                                        <td><img width="50px" src="{{ $hand_work_image->image }}" alt=""></td>
                                        <td>{{ $hand_work_image->handWork->title_en }}</td>
                                        <td>{{ $hand_work_image->status }}</td>
                                        <td>{{ $hand_work_image->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.hand_work_images.edit',$hand_work_image->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post" action="{{ route('backend.hand_work_images.destroy',$hand_work_image->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $hand_work_images->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
