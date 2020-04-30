@extends('backend.layouts.app', [
    'namePage' => 'New Creations',
    'class' => 'sidebar-mini',
    'activePage' => 'new_creation',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> New Creations List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.new_creations.create') }}">
                                <button class="btn btn-primary">Create</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Video Thumbnail</th>
                                <th>Title</th>
                                <th>Writer</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($new_creations as $new_creation)
                                    <tr>
                                        <td>{{ $new_creation->id }}</td>
                                        <td><img width="50px" src="{{ $new_creation->video_thumbnail }}" alt=""></td>
                                        <td>{{ $new_creation->title_en }}</td>
                                        <td>{{ $new_creation->writer_en }}</td>
                                        <td>{{ $new_creation->status }}</td>
                                        <td>{{ $new_creation->created_at }}</td>
                                        <td>
                                            <a href="{{ route('backend.new_creations.edit',$new_creation->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post" action="{{ route('backend.new_creations.destroy',$new_creation->id) }}">
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
                        {{ $new_creations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
