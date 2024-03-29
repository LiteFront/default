<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ Theme::getMetaTitle() }} - {{__('app.name')}}</title>
    <meta name="keyword" content="{{ Theme::getMetaKeyword() }}">
    <meta name="description" content="{{ Theme::getMetaDescription() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{asset('apple-touch-icon.png')}}">

    {!! Theme::asset()->styles() !!}
    {!! Theme::asset()->scripts() !!}
</head>

<body>
    <div class="app-wrap">
        {!! Theme::partial('aside') !!}
        <div class="app-content-wrap">
            <div class="app-list-wrap">
                <div class="app-list-inner">
                    @if(isset($modules))
                    <div class="app-list-header d-flex align-items-center justify-content-between">
                        <div class="app-tabs">
                            @foreach($modules as $module)
                            <a href="{{$module['url']}}" class="{{$module['status']}}"><i
                                    class="{{$module['icon'] ?? 'las la-ellipsis-h'}}"></i><span>{{$module['name']}}</span> </a>
                            @endforeach
                        </div>
                        @if(isset($form['urls']['create']))
                        <button type="button" class="btn add-app-btn btn-icon btn-outline" id='btn-create' data-action='CREATE'
                            data-load-to="#app-entry" data-url="{{$form['urls']['create']['url'] ?? ''}}"> New <i
                                class="las la-plus"></i>
                        </button>
                        @endif
                    </div>
                    @if(isset($form['search']) && !empty($form['search']))
                    <div class="app-list-toolbar">
                        <div class="app-list-pagination">
                            <div class="select-all-checkbox">
                                <input type="checkbox" name="check_all" id="check_all">
                                <label for="check_all"></label>
                            </div>
                            <div class="header-search">
                                {!!Theme::partial('search', compact('form'))!!}
                            </div>
                        </div>
                        <button type="button" class="btn delete-app-btn btn-icon btn-outline"><i
                                class="las la-trash" 
                                data-action="ACTIONS" data-list='#app-list' data-method='PATCH'
                                data-href="{!!$form['urls']['list']['url']!!}/actions/delete"></i></button>
                    </div>
                    @endif

                    @endif
                    <div class="app-list-wrap-inner perfect-scroll" id="app-list">
                        <div class="app-items" data-url="{{$form['urls']['list']['url'] ?? ''}}" id="item-list"
                            data-search-form='#search' data-scroll-div='#app-list'>
                            Loading...
                        </div>
                    </div>
                </div>
                @php
                    if (isset($data['id']) && $data['id'] != '') {
                        $url = @$form['urls']['list']['url'] . '/' . $data['id'];
                    } else {
                        $url = @$form['urls']['new']['url'];
                    }
                @endphp
                <div class="app-detail-wrap" id="app-entry" data-url="{{$url}}">
                </div>
                
                <script type="text/javascript">
                $(function() {
                    let tag = $('#item-list');
                    tag.off().load(tag.data("url")+'?page=1&q={{request()->get('q')}}');
                    @if(!empty($form['list']))
                    app.doPageScroll(tag);
                    @endif
                    let appEntry = $('#app-entry');
                    appEntry.off().load(appEntry.data("url"));
                });
                </script>
            </div>
        </div>
    </div>
    {!! Theme::asset()->container('footer')->scripts() !!}
    {!! Theme::asset()->container('extra')->scripts() !!}
</body>

</html>