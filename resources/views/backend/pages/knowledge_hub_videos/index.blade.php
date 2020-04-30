@extends('backend.layouts.app', [
    'namePage' => 'Knowledge Hub Video',
    'class' => 'sidebar-mini',
    'activePage' => 'knowledge_hub_video',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Knowledge Hub Video</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.knowledge_hub_videos.create') }}">
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
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($knowledge_hub_videos as $knowledge_hub_video)
                                    <tr>
                                        <td>{{ $knowledge_hub_video->id }}</td>
                                        <td><img width="50px" src="{{ $knowledge_hub_video->video_thumbnail }}" alt="">
                                        </td>
                                        <td>{{ $knowledge_hub_video->title_en }}</td>
                                        <td>{{ $knowledge_hub_video->status }}</td>
                                        <td>{{ $knowledge_hub_video->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.knowledge_hub_videos.edit',$knowledge_hub_video->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post"
                                                  action="{{ route('backend.knowledge_hub_videos.destroy',$knowledge_hub_video->id) }}">
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
                        {{ $knowledge_hub_videos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
