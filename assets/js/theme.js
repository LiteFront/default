$(document).ready(function(){
    $('html').on("click", function (e) {
        $(".app-list-toggler").removeClass("open");
        $(".app-wrap").removeClass("app-list-expand");
    });
    $('.app-nav-applist').on("click", function (e) {
        e.stopPropagation();
    });
    $(".app-list-toggler").on("click", function (e) {
        return (
            this.classList.toggle("open"),
            $(".app-wrap").toggleClass("app-list-expand"),
            !1
        );
    });

    $(".app-nav-close").on("click", function (e) {
        $(".app-list-toggler").removeClass("open");
        $(".app-wrap").removeClass("app-list-expand");
    });

    $("#apps-quick-search").keyup(function () {
        var e = $(this).val().trim().toLowerCase();
        $(".app-item")
          .hide()
          .filter(function () {
            return -1 != $(this).html().trim().toLowerCase().indexOf(e);
          })
          .show();
    });
	$('[data-bs-toggle="tooltip"]').tooltip();
	$('.select2').select2({
        closeOnSelect: false,
        minimumResultsForSearch: -1
    });
    $('.datepicker').datetimepicker({
        format: 'L'
    });
    $(".add-filter-btn").on('click', function(){
    	$(".filter-list-wrap").toggle().css('opacity', '1');
    });
    $('.header-filter .dropdown-menu').click(function(e) {
    	e.stopPropagation();
    });
    
  	$(".dropdown-close-btn").on('click', function(){
  		$(this).closest(".dropdown-menu").prev().dropdown("toggle");
  	});
  	$(".search-btn").on("click", function(e) {
        e.stopPropagation();
    });



    $('.dropdown .has-child').on('click', 'a[data-bs-toggle="collapse"]', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $($(this).attr('href')).collapse('toggle');
    });
    var ps = new PerfectScrollbar(".main-nav-wrap", {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 5
    });
    
    var ps = new PerfectScrollbar(".apps-wrap", {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 5
    });

    
    // $(document).on('mouseover', '.navbar .dropdown-toggle', function(e) {
    //     var dMenu = $(this).data('dropdown');
    //     $('.' + dMenu).dropdown('show');
    // });
    // $(document).on('mouseleave', '.navbar .dropdown-toggle', function(e) {
    //     var dMenu = $(this).data('dropdown');
    //     $('.' + dMenu).dropdown('hide');
    // });

    // var dropdownMenu, appListDropdown;
    // $(window).on('show.bs.dropdown', '[data-bs-toggle=dropdown]', function (e) {
    //     appListDropdown = $(e.target).find('.app-list-dropdown');
    //     dropdownMenu = $(e.target).find('.main-nav-dropdown');
    //     $('.app-nav').append(dropdownMenu.detach());
    //     $('.app-content-wrap').append(appListDropdown.detach());
    //     var eOffset = $(e.target).offset();
    //     appListDropdown.css({
    //         'display': 'block',
    //         'top': eOffset.top,
    //         'left': eOffset.left + 73
    //     });
    //     dropdownMenu.css({
    //         'display': 'block',
    //         'top': eOffset.top,
    //         'left': eOffset.left + 73
    //     });
    // });
    // $(window).on('hide.bs.dropdown', '[data-bs-toggle=dropdown]', function (e) {
    //     $(e.target).append(appListDropdown.detach());
    //     appListDropdown.hide();
    //     $(e.target).append(dropdownMenu.detach());
    //     dropdownMenu.hide();
    // });

    $('.main-nav-wrap').each(function() {
        let mainNavWrap = $(this);
        mainNavWrap.on('show.bs.dropdown', '[data-bs-toggle=dropdown]', function(e) {
            let dropdown = bootstrap.Dropdown.getInstance(this);
            let eOffset = $(e.target).offset();
            $(dropdown._menu).insertAfter(mainNavWrap);
            $(dropdown._menu).css({
                'display': 'block',
                'top': eOffset.top,
                'left': eOffset.left + 73
            });
        });
        mainNavWrap.on('hide.bs.dropdown', '[data-bs-toggle=dropdown]', function(e) {
            let dropdown = bootstrap.Dropdown.getInstance(this);
            $(dropdown._menu).hide();
        });
    })
    

    $('.app-avatar-checkbox input[type="checkbox"]').change(function(e){
        if($(this).not(":checked").length == 0) {
            $('.app-item').addClass('checked');
        } else {
            $('.app-item').removeClass('checked');
        }
    });

    $('.select-all-checkbox input[type="checkbox"]').change(function(){
        if(this.checked){
            $('.app-avatar-checkbox input[type="checkbox"]').each(function(){
                this.checked=true;
                $('.app-item').addClass('checked');
            })              
        }else{
            $('.app-avatar-checkbox input[type="checkbox"]').each(function(){
                this.checked=false;
                $('.app-item').removeClass('checked');
            })              
        }
    });

    $('.header-search .dropdown-menu').click(function(e) {
        e.stopPropagation();
    });

    if ($(window).width() < 991) {
        // $('.app-item .app-info').on('click', function(){
        //     $('#entryModal').modal('show')
        // });
        $('.app-item .app-info').on('click', function(){
            $('.app-detail-wrap').show();
        });
    } else {

    }
    var entrymodalActions = $('#entrymodalActions').html();
    $(window).on('load resize', function(){
        if ($(window).width() <= 600) {
            $("#entrymodalActionFooter").html(entrymodalActions);
            $("#entrymodalActions").empty();
        } else {
            $("#entrymodalActionFooter").empty();
        }
    });

    $('.mobile-back-btn').on('click', function() {
        $('.app-detail-wrap').hide();
    });
    
    $('.adv-search-close').on('click', function() {
        $('#adv_wrap_toggler').dropdown('hide');
    });


    $(".app-item").on('click', function() {
        $(".app-item").removeClass('selected');
        $(this).addClass('selected');
        $(".app-detail-empty").hide();
        $(".app-entry-form-wrap").show();
    });
    if ($(window).width() < 768) {
        $('.app-detail-wrap').hide();
    } else {

    }
    

});