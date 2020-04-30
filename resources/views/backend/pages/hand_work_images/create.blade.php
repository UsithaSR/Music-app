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
                    <div class="pull-right">
                        <a href="{{ route('backend.hand_work_images.index') }}">
                            <button class="btn btn-dark" style="margin-right: 15px;">Back</button>
                        </a>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title"> Create Hand Work Image</h4>
                    </div>
                    <div class="card-body">
                        <form id="hand_work_image_create" method="post" action="{{ route('backend.hand_work_images.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('backend.alerts.success')
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="hand_work_id">{{__(" Hand Work Categories")}}</label>
                                        <select class="form-control" id="hand_work_id" name="hand_work_id">
                                            @foreach($hand_works as $hand_work)
                                                <option value="{{$hand_work->id}}">{{$hand_work->title_en}}</option>
                                            @endforeach
                                        </select>
                                        @include('backend.alerts.feedback', ['field' => 'hand_work_id'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label class="d-block" for="title">{{__(" Upload Image")}}</label>
                                        <img class="gal-img prev_img" id="prev_img" src="{{asset('assets/img/dummy.jpg')}}">
                                        <input type="file" class="custom-file-input" name="image" id="custom-file-input" >
                                        @include('backend.alerts.feedback', ['field' => 'image'])
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary btn-round">{{__('Create')}}</button>
                            </div>
                            <hr class="half-rule"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--        <!-- Laravel Javascript Validation -->--}}
    {{--        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>--}}
    {{--        {!! JsValidator::formRequest('App\Http\Requests\CMS\SongCategoryCreateRequest', '#hand_work_image_create') !!}--}}
@endsection
