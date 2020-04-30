@extends('backend.layouts.app', [
    'namePage' => 'Knowledge Hub Image',
    'class' => 'sidebar-mini',
    'activePage' => 'knowledge_hub_image',
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Knowledge Hub Image</h4>
                        <div class="pull-right">
                            <a href="{{ route('backend.knowledge_hub_images.create') }}">
                                <button class="btn btn-primary">Create</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Image Thumbnail</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($knowledge_hub_images as $knowledge_hub_image)
                                    <tr>
                                        <td>{{ $knowledge_hub_image->id }}</td>
                                        <td>{{ $knowledge_hub_image->title_en }}</td>
                                        <td><img width="50px" src="{{ $knowledge_hub_image->image }}" alt=""></td>
                                        <td><img width="50px" src="{{ $knowledge_hub_image->image_thumbnail }}" alt="">
                                        </td>
                                        <td>{{ $knowledge_hub_image->status }}</td>
                                        <td>{{ $knowledge_hub_image->created_at }}</td>
                                        <td>
                                            {{--                                            <button class="btn btn-warning" onclick="changeStatus({{ $restaurant->id }})">Approve / Reject</button>--}}
                                            <a href="{{ route('backend.knowledge_hub_images.edit',$knowledge_hub_image->id) }}">
                                                <button class="btn btn-default">Edit</button>
                                            </a>
                                            <form method="post"
                                                  action="{{ route('backend.knowledge_hub_images.destroy',$knowledge_hub_image->id) }}">
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
                        {{ $knowledge_hub_images->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
