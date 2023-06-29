<form id="search">
    <div id="search-div"><input type="text" class="form-control" placeholder="Search..." id="q" name="q" value=""></div>

    <span class="search-btn"><i class="las la-search"></i></span>
    @if(!empty($form['search']))
    <button type="button" class="settings dropdown-toggle" id="adv_wrap_toggler" data-toggle="dropdown"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="las la-sliders-h"></i></button>
    <div class="adv-search-wrap dropdown-menu" aria-labelledby="adv_wrap_toggler" style="width: calc(100% + 50px);">
        <div class="adv-search-header">
            <div class="search-title">
                <h4>Search</h4>
                <div class="search-dropdown">
                    <div class="search-item">
                        <select class="form-control" name="sort" id="sortBy">
                            <option disabled>Search Field</option>
                            @forelse ($form['orderBy'] as $key=>$option)
                            <option value="{{$key}}">{{$option}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="search-item">
                        <button class="btn btn-sort active" type="button" data-toggle="tooltip" data-placement="top"
                            title="Sort by Ascending" id="sort_asc_id" value="ASC"><i
                                class="las la-sort-alpha-down"></i></button>
                    </div>
                    <div class="search-item">
                        <button class="btn btn-sort" type="button" title="Sort by Descending" id="sort_desc_id"
                            value="DESC"><i class="las la-sort-alpha-down-alt"></i></button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn adv-search-close"><i class="las la-times"></i></button>
        </div>
            <div class="adv-search-form-wrap repeater">
                <div class="row gutter-5 adv-search-form-item">
                    <div class="col-md-4"><label for="">Field</label></div>
                    <div class="col-md-4"><label for="">Criteria</label></div>
                    <div class="col-md-4 value_div_1"><label for="">Value</label></div>
                </div>
                <div class="adv-search-form-item-wrap" data-repeater-list="group">
                    <div class="row gutter-5 adv-search-form-item" data-repeater-item id="search_div_1">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control " onchange="getval(1,this)" name="group[1][field]"
                                    id="field_1">
                                    <option disabled selected value="">Please select</option>
                                    @forelse ($form['search'] as $key=>$option)
                                    <option value="{{$key}}">{{$option['label']}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <select class="form-control criteria-field-1" name="group[1][criteria]" id="criteria_1"
                                    onchange="getCriteria(1,this)">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 value_div_1">
                            <div class="form-group">
                                <div id="value-field-1"><input type="text" class="form-control"
                                        placeholder="Please enter " name="group[1]['value']" id="value_1"></div>
                                <div id="value-select-field-1">
                                    <select class="form-control" id="select-field-1" name="group[1][value]">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="between_div_1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="between-min-1"
                                            placeholder="Minimum value " name="group[1][between]['min']">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="between-max-1"
                                            placeholder="Maximum value " name="group[1][between]['max']">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn adv-search-form-item-delete-btn" data-repeater-delete
                            onclick="removeSearch(1)"><i class="las la-times"></i></button>
                    </div>
                    <div id="search_div_"></div>
                </div>
                <button type="button" class="btn adv-search-form-item-add-btn" onclick="addSearch()"
                    data-repeater-create><i class="las la-plus-circle"></i></button>
            </div>

            <button type="button" type="submit" class="btn btn-theme" id="submitBtn">Search</button>
    </div>
    @endif

</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script type="text/javascript">
    // var arr = [];
    // var order = '';
    // var module_link = window.location.href;
    // $("#value-select-field-1").hide();
    // $('#between_div_1').hide();

    // $(document).ready(function(){
    //     var items = <?php echo json_encode($form['search']) ; ?>;
    //     $("#submitBtn").click(function(){
    //         // alert('sd');
    //         console.log(arr.length,order);
    //         if(arr.length==0)
    //         {
    //             var v ={
    //             field: document.getElementById('field_1').value,
    //             criteria: document.getElementById('criteria_1').value,
    //             value: document.getElementById('value_1').value ||
    //                     document.getElementById('select-field-1').value ||
    //                     {
    //                         min: document.getElementById('between-min-1').value,
    //                         max: document.getElementById('between-max-1').value
    //                     },
    //             };
    //             arr.push(v);console.log('v',v);
    //         }else{
    //             console.log(arr.length,arr);
    //             var last_arry ={
    //             field: document.getElementById('field_'+(arr.length+1)).value,
    //             criteria: document.getElementById('criteria_'+(arr.length+1)).value,
    //             value: document.getElementById('value_'+(arr.length+1)).value ||
    //                     document.getElementById('select-field-'+(search_count-1)).value ||
    //                     {
    //                         min:document.getElementById('between-min-'+(search_count-1)).value,
    //                         max:document.getElementById('between-max-'+(search_count-1)).value
    //                     },
    //             };
    //             arr.push(last_arry);
    //         }console.log('main',arr);

    //         var search_text = '';
    //         $.each(arr, function(index,jsonObject){

    //             if(jsonObject.criteria=='like' || jsonObject.criteria=='>' || jsonObject.criteria=='<' || jsonObject.criteria=='>=' || jsonObject.criteria=='<=' )
    //             {
    //                 jsonObject.value = '('+jsonObject.value+')';
    //             }
    //             if(jsonObject.criteria=='like%...%')
    //             {
    //                 jsonObject.criteria = 'like';
    //                 jsonObject.value = '(%'+jsonObject.value+'%)';
    //             }
    //             if(jsonObject.criteria=='start_with')
    //             {
    //                 jsonObject.criteria = 'like';
    //                 jsonObject.value = '('+jsonObject.value+'%)';
    //             }
    //             if(jsonObject.criteria=='end_with')
    //             {
    //                 jsonObject.criteria = 'like';
    //                 jsonObject.value = '(%'+jsonObject.value+')';
    //             }
    //             if(jsonObject.criteria=='not_like')
    //             {
    //                 jsonObject.criteria = 'NOT LIKE';
    //                 jsonObject.value = '('+jsonObject.value+')';
    //             }
    //             if(jsonObject.criteria=='not_null')
    //             {
    //                 jsonObject.criteria = 'NOT NULL';
    //                 jsonObject.value = '';
    //             }
    //             if(jsonObject.criteria == 'null')
    //             {
    //                 jsonObject.value = '';
    //             }
    //             if(jsonObject.criteria == '=')
    //             {
    //                 jsonObject.criteria = '';
    //             }
    //             if(jsonObject.criteria == '!=')
    //             {
    //                 jsonObject.value = '('+jsonObject.value+')';
    //             }
    //             if(jsonObject.criteria == 'between')
    //             {
    //                 jsonObject.value = '('+jsonObject.value.min+','+jsonObject.value.max+')';
    //             }
    //             if(jsonObject.criteria == 'not_between')
    //             {
    //                 jsonObject.criteria = 'NOT BETWEEN';
    //                 jsonObject.value = '('+jsonObject.value.min+','+jsonObject.value.max+')';
    //             }
    //             if(jsonObject.criteria == null)
    //             {
    //                 jsonObject.criteria = '';
    //                 jsonObject.value = '';
    //             }
    //             if(jsonObject.criteria == '')
    //             {
    //                 jsonObject.criteria = '';
    //             }
    //             search_text +=  jsonObject.field+':'+jsonObject.criteria+jsonObject.value+';'
    //             if(jQuery.isEmptyObject(jsonObject.criteria) && jQuery.isEmptyObject(jsonObject.field))
    //             {
    //                 search_text = '';
    //             }
    //         });

    //         $("#search-div").html('<input type="text" class="form-control" placeholder="Search..." id="q" name="q" value="'+search_text+'">')
    //         var formData = $("#q").serializeArray();
    //         if ($("#sort_asc_id").hasClass("active")) {
    //             var order =$("#sort_asc_id").val();
    //         }
    //         if ($("#sort_desc_id").hasClass("active")) {
    //             var order =$("#sort_desc_id").val();
    //         }
    //         var sort_by =$("#sortBy").val();
    //         var sort=sort_by + ':'+ order+ ';';
    //         console.log('sort:',sort);
    //         app.load('#app-list', module_link + '?q='+encodeURIComponent(formData[0]['value'])+'&&sort='+encodeURIComponent(sort));
    //         // $(".header-search").toggleClass("close");
    //         $('#adv_wrap_toggler').dropdown('hide');
    //         $('#search').trigger("reset");
    //         arr.length = 0;
    //     });

    // });
    // $(function() {
    //     $("span.search-btn").on('click', function () {
    //         var formData = $("#q").serializeArray();
    //         app.load('#app-list', module_link + '?q=' + formData[0]['value']);
    //     });
    //     $("input").on('click', function () {
    //         var formData = $("#q").serializeArray();
    //         app.load('#app-list', module_link + '?q=' + formData[0]['value']);
    //     });
    //     $('.btn').click(function(){
    //         $('.btn').removeClass('active').addClass('inactive');
    //         $(this).removeClass('inactive').addClass('active');
    //         var order = $(this).val();
    //     });
    // });
    // var count = 1;
    // var search_count = 2;

    // function addSearch(){
    //     var group = {
    //         field: document.getElementById('field_'+(search_count-1)).value,
    //         criteria: document.getElementById('criteria_'+(search_count-1)).value,
    //         value: document.getElementById('value_'+(search_count-1)).value ||
    //                 document.getElementById('select-field-'+(search_count-1)).value ||
    //                 {
    //                     min: document.getElementById('between-min-'+(search_count-1)).value,
    //                     max: document.getElementById('between-max-'+(search_count-1)).value
    //                 },
    //     };

    //     arr.push(group);console.log('g',arr);

    //     var newTextBoxDiv = $(document.createElement('div')).attr("id", 'search_div_' + search_count);
    //     var field = '';
    //     $.each(items, function(index,jsonObject){
    //     field+= '<option value=' +index+ '>' +jsonObject.label+ '</option>';
    //     })

    //     console.log('test',field);
    //     // newTextBoxDiv.after().html('<div data-repeater-list="group-a"><div class="position-relative" data-repeater-item><div class="row"><div class="col-md-5"> <div class="form-group"><input class="form-control" id="menuname" data-placeholder="name" placeholder="title" name="menus[' + search_count + '][name]"></div></div><div class="col-md-5"> <div class="form-group"><input class="form-control" id="menu_url" data-placeholder="url" placeholder="url" name="menus[' + search_count + '][url]"></div></div><div class="col-md-1"><button data-repeater-delete class="btn btn-success btn-icon" type="button" onclick="removeSearch(' +search_count + ')" ><i class="fa fa-trash"></i></button></div></div></div></div>');
    //     newTextBoxDiv.after().html('<div class="row gutter-5 adv-search-form-item"><div class="col-md-4"><div class="form-group"><select class="form-control" onchange="getval('+search_count+',this)" name="group[' + search_count + '][field]" id="field_'+ search_count+'"><option disabled selected value="">Please select</option>'+field+'</select></div></div><div class="col-md-4"><div class="form-group"><select class="form-control criteria-field-'+search_count+'" name="group[' + search_count + '][criteria]" id="criteria_'+ search_count+'" onchange="getCriteria('+search_count+',this)"></select></div></div><div class="col-md-4 value_div_'+search_count+'"><div class="form-group"><div id="value-field-'+search_count+'"><input type="text" class="form-control" placeholder="Please enter" name="group[' + search_count + '][value]" id="value_'+ search_count+'"></div><div id="value-select-field-'+search_count+'"><select class="form-control" id="select-field-'+search_count+'" name="group[' + search_count + '][value]" id="value_select_'+ search_count+'"></select></div></div> </div><div class="col-md-12" id="between_div_'+search_count+'"><div class="row"><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" placeholder="Minimum value " id="between-min-'+search_count+'" name="group['+search_count+'][min]"></div></div><div class="col-md-6"><div class="form-group"><input type="text" class="form-control" placeholder="Maximum value " id="between-max-'+search_count+'" name="group[' + search_count + '][max]"></div></div></div></div><button type="button" class="btn adv-search-form-item-delete-btn" onclick="removeSearch(' +search_count + ')"><i class="las la-times"></i></button></div>');

    //     newTextBoxDiv.appendTo("#search_div_");
    //     $("#value-select-field-"+search_count).hide();
    //     $("#between_div_"+search_count).hide();
    //     // var add_search_key['search_count'] = [field: "",criteria: "",value: ""];console.log(add_search_key,newTextBoxDiv);
    //     search_count++;
    // }
    // function removeSearch(key) {
    //         document.getElementById('search_div_'+key).remove();
    // }
    // var items = <?php echo json_encode($form['search']) ; ?>;
    // function getval(id,data){

    //     var field = data.value;
    //     // $("#criteria-field").prepend("");
    //     var options  = items[field]['criteria'];console.log('options',options);
    //     var str = '';
    //     $(".criteria-field-"+id).empty();
    //     str+= ' <option disabled selected value=" ">Please select</option>';
    //     $.each(items[field]['criteria'], function(index,jsonObject){
    //     str+= '<option value="' +index+ '">' +jsonObject+ '</option>';

    //     })

    //     $(".criteria-field-"+id).append(str);
    //      if(items[field]['options']!=undefined)
    //      {
    //         var val = '';
    //         $("#value-select-field-"+id).show();
    //         $("#value-field-"+id).hide();
    //         $("#select-field-"+id).empty();
    //         // val += '<select class="form-control" name="value">';
    //         val+= '<option value="" disabled selected>Please select</option>';
    //         $.each(items[field]['options'], function(index,jsonObject){
    //         val+= '<option value="' +index+ '">' +jsonObject+ '</option>';

    //         })
    //         // val += '</select>';

    //         $("#select-field-"+id).append(val);
    //      }
    //      else
    //      {
    //         $("#value-select-field-"+id).hide();
    //         $("#value-field-"+id).show();
    //         // $("#value-field-"+id).empty()
    //         // $("#value-field-"+id).append('<input type="text" class="form-control" placeholder="Please enter " name="value">');
    //      }
    // }
    // function getCriteria(id,data){
    //     var value = data.value;console.log(value);
    //     if(value=='between' || value=='not_between')
    //     {
    //         $('.value_div_'+id).hide();
    //         $('#between_div_'+id).show();
    //     }else
    //     {
    //         $('.value_div_'+id).show();
    //         $('#between_div_'+id).hide();
    //     }
    // }
</script>
