@extends('backend.layouts.app', [
    'namePage' => 'Riddles',
    'class' => 'sidebar-mini',
    'activePage' => 'riddle',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Riddle List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.riddles.create') }}">
                                <button class="btn btn-primary">Create</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Image Thumbnail</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($riddles as $riddle)
                                    <tr>
                                        <td>{{ $riddle->id }}</td>
                                        <td><img width="50px" src="{{ $riddle->image_thumbnail }}" alt=""></td>
                                        <td>{{ $riddle->title_en }}</td>
                                        <td>{{ $riddle->content_en }}</td>
                                        <td>{{ $riddle->status }}</td>
                                        <td>{{ $riddle->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.riddles.edit',$riddle->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post" action="{{ route('backend.riddles.destroy',$riddle->id) }}">
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
                        {{ $riddles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
