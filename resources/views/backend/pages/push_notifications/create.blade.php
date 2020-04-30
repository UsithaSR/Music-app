@extends('backend.layouts.app', [
    'namePage' => 'Push Notifications',
    'class' => 'sidebar-mini',
    'activePage' => 'push_notifications',
  ])


@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="pull-right">
                            <button class="btn btn-dark" style="margin-right: 15px;">Back</button>
                        </a>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title"> Send Push Notifications To All APP Users</h4>
                    </div>
                    <div class="card-body">
                        <form id="push_notification_create" method="post" action="{{ route('backend.push_notifications.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('backend.alerts.success')
                            <div class="row">
                                <div class="col-md-7 pr-1">
                                    <div class="form-group">
                                        <label for="content">{{__(" Message")}}</label>
                                        <textarea rows="10" type="text" name="message" class="form-control" style="border:1px solid #E3E3E3">{{ old('message') }}</textarea>
                                        @include('backend.alerts.feedback', ['field' => 'message'])
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary btn-round">{{__('Submit')}}</button>
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
