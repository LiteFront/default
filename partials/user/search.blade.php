    <input type="search" class="form-control" placeholder="Search..." id="q" name="q">
    <span class="search-btn" id="search-btn"><i class="las la-search"></i></span>
    <button type="button" class="settings dropdown-toggle" id="adv_search_toggler" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"><i class="las la-sliders-h"></i></button>
        <form id="search" name="search">

    <div class="adv-search-wrap dropdown-menu" aria-labelledby="adv_search_toggler">
        <div class="adv-search-header">
            <div class="search-title">
                <h4>Search</h4>
                <div class="search-dropdown">
                    <div class="search-item">
                        <select class="form-control" name="orderBy">
                            <option disabled>Sort By</option>
                            @foreach($form['orderBy'] as $key => $val)
                            <option value="{{$key}}"> {{$val}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="orderDir" id="orderDir" value="DESC">
                    </div>
                    <div class="search-item">
                        <button class="btn btn-sort active" type="button" data-toggle="tooltip" title="Sort by Descending" data-order='DESC'>
                            <i class="las la-sort-alpha-down-alt"></i>
                        </button>
                    </div>
                    <div class="search-item">
                        <button class="btn btn-sort"  type="button" data-toggle="tooltip" title="Sort by Ascending" data-order='ASC'>
                            <i class="las la-sort-alpha-down"></i>
                            </button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn adv-search-close"><i class="las la-times"></i></button>
        </div>
        <div class="row gutter-5">
            @foreach($form['search'] as $key => $search)
            <div class="col-{!!$search['col'] ?? '12'!!}">
                {!! Form::input($key)
                    ->name("search[$key]")
                    ->id("search[$key]")
                    ->apply($search)
                    ->raw()!!}
            </div>
            @endforeach
        </div>
        <br />
        <button class="btn btn-theme" type="button" id="filter-btn">Search</button>
        <button class="btn btn-grey" type="button" id="clear-btn">Clear</button>
    </div>
</form>
<script type="text/javascript">
$(function() {
    $('#filter-btn').click(function(e) {
        var search = app.prepareSearch($('form#search :input'));
        console.log($('form#search :input'));
        // $('#q').val('form#search :input');
        $('#q').trigger('search');
        $(".header-search").toggleClass("open");
    });

    $('#q').on('search', function() {
        console.log($(this).val());
    });

    $('#clear-btn').click(function(e) {
        $('form#search').trigger('reset');
        $('#q').value('');
        $('#q').trigger('search');
    });

    $('.btn-sort').click(function(event) {
        $('.btn-sort').removeClass('active')
        $(this).addClass('active')
        $('#orderDir').val($(this).data('order'))
    });     
});
</script>
