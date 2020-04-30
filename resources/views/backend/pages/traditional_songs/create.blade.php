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
                    <div class="pull-right">
                        <a href="{{ route('backend.traditional_songs.index') }}">
                            <button class="btn btn-dark" style="margin-right: 15px;">Back</button>
                        </a>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title"> Create Traditional Song</h4>
                    </div>
                    <div class="card-body">
                        <form id="traditional_song_create" method="post" action="{{ route('backend.traditional_songs.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('backend.alerts.success')
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Title English")}}</label>
                                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en') }}">
                                        @include('backend.alerts.feedback', ['field' => 'title_en'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Title Sinhala")}}</label>
                                        <input type="text" name="title_si" class="form-control" value="{{ old('title_si') }}">
                                        @include('backend.alerts.feedback', ['field' => 'title_si'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Title Tamil")}}</label>
                                        <input type="text" name="title_ta" class="form-control" value="{{ old('title_ta') }}">
                                        @include('backend.alerts.feedback', ['field' => 'title_ta'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Writer English")}}</label>
                                        <input type="text" name="writer_en" class="form-control" value="{{ old('writer_en') }}">
                                        @include('backend.alerts.feedback', ['field' => 'writer_en'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Writer Sinahala")}}</label>
                                        <input type="text" name="writer_si" class="form-control" value="{{ old('writer_si') }}">
                                        @include('backend.alerts.feedback', ['field' => 'writer_si'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Writer Tamil")}}</label>
                                        <input type="text" name="writer_ta" class="form-control" value="{{ old('writer_ta') }}">
                                        @include('backend.alerts.feedback', ['field' => 'writer_ta'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label class="d-block" for="title">{{__(" Video Thumbnail")}}</label>
                                        <img class="gal-img prev_img" id="prev_img" src="{{asset('assets/img/dummy.jpg')}}">
                                        <input type="file" class="custom-file-input" name="video_thumbnail" id="custom-file-input" >
                                        @include('backend.alerts.feedback', ['field' => 'video_thumbnail'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Video")}}</label>
                                        <input type="text" name="video" class="form-control" value="{{ old('video') }}">
                                        @include('backend.alerts.feedback', ['field' => 'video'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Content English")}}</label>
                                        <textarea rows="10" type="text" name="content_en" class="form-control"
                                                  style="border:1px solid #E3E3E3">{{ old('content_en') }}</textarea>
                                        @include('backend.alerts.feedback', ['field' => 'content_en'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Content Sinhala")}}</label>
                                        <textarea rows="10" type="text" name="content_si" class="form-control"
                                                  style="border:1px solid #E3E3E3">{{ old('content_si') }}</textarea>
                                        @include('backend.alerts.feedback', ['field' => 'content_si'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{__(" Content Tamil")}}</label>
                                        <textarea rows="10" type="text" name="content_ta" class="form-control"
                                                  style="border:1px solid #E3E3E3">{{ old('content_ta') }}</textarea>
                                        @include('backend.alerts.feedback', ['field' => 'content_ta'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="categories">{{__(" Song Categories")}}</label>
                                        <select id="categories" name="categories[]" multiple="multiple" style="width: 450px">
                                            @foreach($song_categories as $song_category)
                                                <option value="{{$song_category->id}}">{{$song_category->title_en}}</option>
                                            @endforeach
                                        </select>
                                        @include('backend.alerts.feedback', ['field' => 'categories'])
                                        <script>
                                            $(document).ready(function () {
                                                $('#categories').select2();
                                            });
                                        </script>
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

{{--    <!-- Laravel Javascript Validation -->--}}
{{--    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>--}}
{{--    {!! JsValidator::formRequest('App\Http\Requests\CMS\AdCreateRequest', '#traditional_song_create') !!}--}}
@endsection
