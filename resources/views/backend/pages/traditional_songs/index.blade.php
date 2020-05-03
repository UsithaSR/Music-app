@extends('backend.layouts.app', [
    'namePage' => 'Traditional Songs',
    'class' => 'sidebar-mini',
    'activePage' => 'traditional_song',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Traditional Songs List</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.traditional_songs.create') }}">
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
                                @foreach($traditional_songs as $traditional_song)
                                    <tr>
                                        <td>{{ $traditional_song->id }}</td>
                                        <td><img width="50px" src="{{ $traditional_song->video_thumbnail }}" alt=""></td>
                                        <td>{{ $traditional_song->title_en }}</td>
                                        <td>{{ $traditional_song->writer_en }}</td>
                                        <td>{{ $traditional_song->status }}</td>
                                        <td>{{ $traditional_song->created_at }}</td>
                                        <td>
{{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.traditional_songs.edit',$traditional_song->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                                </a>
                                            <form method="post" action="{{ route('backend.traditional_songs.destroy',$traditional_song->id) }}">
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
                        {{ $traditional_songs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
