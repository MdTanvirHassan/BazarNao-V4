@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Chart Of Account Create')}}</h5>
            </div>

            <form class="form-horizontal" action="{{ route('accounts.insert_coa2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <meta name="csrf-token" content="{{ csrf_token() }}">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="coahead">{{ translate('COA Head') }}</label>
                        <div class="col-sm-4">
                            <select name="coahead" class="form-control" onchange="selectParentHead()" id="coahead">
                                <option value="">{{ translate('Select Option') }}</option>
                                @foreach ($coa_head as $acc)
                                    <option value="{{ $acc->HeadCode }}" data-level="{{ $acc->HeadLevel }}">{{ $acc->HeadName }} ({{ $acc->HeadLevel }})</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label" for="Parentcategory">{{ translate('Sub COA Head') }}</label>
                        <div class="col-sm-4">
                            <select name="pheadcodes" class="form-control" id="Parentcategory" onchange="selectSubParentHead()">
                                <option value="">{{ translate('Select Option') }}</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="ParentSubcategory">{{ translate('Sub-Sub COA Head') }}</label>
                        <div class="col-sm-4">
                            <select name="pheadcode" class="form-control" id="ParentSubcategory">
                                <option value="" class="fw-bold">{{ translate('Select Option') }}</option>
                            </select>
                        </div>
                        <label class="col-sm-2 col-from-label" for="head_name">{{translate('Head Name')}}</label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="{{translate('Head Name')}}" id="head_name" name="headname" class="form-control">
                        </div>
                    </div>



                    
                    
                   
                    
                    
                    {{-- <div class="form-group row">
                        
                    </div> --}}

                    <div class="d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="transaction" id="flexCheckTransaction">
                            <label class="form-check-label" for="flexCheckTransaction">
                                Transaction
                            </label>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" type="checkbox" value="active" id="flexCheckActive">
                            <label class="form-check-label" for="flexCheckActive">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="gl_head" id="flexCheckGLHead">
                            <label class="form-check-label" for="flexCheckGLHead">
                                GL Head
                            </label>
                        </div>
                    </div>                    
                   
                    <div class="form-group mb-0 text-right">
                        <button type="reset" class="btn btn-sm btn-secondary">{{translate('Reset')}}</button>
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        {{-- <a href="{{route('customers.index')}}" class="btn btn-sm btn-danger">
                            <span class="aiz-side-nav-text">{{translate('Go Back')}}</span>
                        </a> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="col-lg-12 bg-white">
        <table width="100%" class="datatable table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>{{ __('Head Code') }}</th>
                    <th>{{ __('PHead Name') }}</th>
                    <th>{{ __('PHead') }}</th>
                    <th>{{ __('Head Type') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_coa_head as $acc)
                    <tr>
                        <td>{{ $acc->HeadCode }}</td>
                        <td>{{ $acc->HeadName }}</td>
                        <td>{{ $acc->PHeadName }}</td>
                        <td>{{ $acc->HeadType }}</td>
                        <td> --}}
                            {{-- <a href="{{ route('accounts.edit_coa', $acc->HeadCode) }}"><i class="fas fa-edit"></i></a> --}}
                            {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}

<script>

function selectParentHead() {
    var coaheadValue = document.getElementById('coahead').value;
    var parentCategorySelect = document.getElementById('Parentcategory');
    var HeadName = $('#coahead option:selected').text();
    var headlevel = $('#coahead option:selected').data('level');

    parentCategorySelect.innerHTML = '<option value="">{{ translate('Select Option') }}</option>';

    fetchSubCoaHeads(coaheadValue, parentCategorySelect, HeadName, headlevel);
}

function fetchSubCoaHeads(HeadCode, dropdown, HeadName, headlevel) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var url = '{{ route("accounts.selectPhead") }}';

    $.ajax({
        type: 'POST',
        url: url,
        data: { phead: HeadCode, _token: csrfToken },
        success: function(data) {
            console.log('Response data:', data);
            var options = `<option value="">${HeadName} - ${translate('Select Option')}</option>`;
            if (Array.isArray(data)) {
                data.forEach(function(item) {
                    var indent = '&nbsp;'.repeat(item.HeadLevel * 2);
                    options += `<option value="${item.HeadCode}" data-level="${item.HeadLevel}">${indent}${item.HeadName} (${item.HeadLevel})</option>`;
                });
            } else {
                console.error('Unexpected data format:', data);
            }
            dropdown.innerHTML = options;
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}

function selectSubParentHead() {
    var parentCategoryValue = document.getElementById('Parentcategory').value;
    var parentSubcategorySelect = document.getElementById('ParentSubcategory');
    var HeadName = $('#Parentcategory option:selected').text();
    var headlevel = $('#Parentcategory option:selected').data('level');

    parentSubcategorySelect.innerHTML = '<option value="">{{ translate('Select Option') }}</option>';

    fetchSubCoaHeads(parentCategoryValue, parentSubcategorySelect, HeadName, headlevel);
}

function translate(key) {
    return key; // Implement your translation logic if needed
}


// function selectparenthead() {
//         var coaheadValue = document.getElementById('coahead').value;
//         var parentCategorySelect = document.getElementById('Parentcategory');

//         parentCategorySelect.innerHTML = '<option value="">{{ translate('Select Option') }}</option>';

//         @foreach ($sub_coa_head as $sub_acc)
//             if ('{{ $sub_acc->PHeadCode }}' == coaheadValue) {
//                 var option = document.createElement('option');
//                 option.value = '{{ $sub_acc->HeadCode }}';
//                 option.textContent = '{{ $sub_acc->HeadName }}';
//                 parentCategorySelect.appendChild(option);
//             }
//         @endforeach
//     }

//     function selectsubparenthead() {
//         var parentCategoryValue = document.getElementById('Parentcategory').value;
//         var parentSubcategorySelect = document.getElementById('ParentSubcategory');

//         parentSubcategorySelect.innerHTML = '<option value="">{{ translate('Select Option') }}</option>';

//         @foreach ($sub_coa_head as $sub_acc)
//             if ('{{ $sub_acc->PHeadCode }}' == parentCategoryValue) {
//                 var option = document.createElement('option');
//                 option.value = '{{ $sub_acc->HeadCode }}';
//                 option.textContent = '{{ $sub_acc->HeadName }}({{ $sub_acc->HeadLevel}})';
//                 parentSubcategorySelect.appendChild(option);
//                 @foreach ($sub_coa_head as $sub)
//                     if ('{{ $sub->PHeadCode }}' == option.value) {
//                         var options = document.createElement('option');
//                         options.value = '{{ $sub->HeadCode }}';
//                         options.textContent = '-{{ $sub->HeadName }}({{ $sub->HeadLevel}})';
//                         parentSubcategorySelect.appendChild(options);

//                         @foreach ($sub_coa_head as $sub_sub)
//                             if ('{{ $sub_sub->PHeadCode }}' == options.value) {
//                                 var suboption = document.createElement('option');
//                                 option2.value = '{{ $sub_sub->HeadCode }}';
//                                 option2.textContent = '--{{ $sub_sub->HeadName }}({{ $sub_sub->HeadLevel}})';
//                                 parentSubcategorySelect.appendChild(option2);
                                
//                             }
//                         @endforeach
                        
//                     }
//                 @endforeach
//             }
//         @endforeach
//     }
   
    // document.getElementById('coa_head').addEventListener('change', function () {
    //     var pheadId = this.value;

    //     fetch('/accounts/fetch-sub-coa', {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //         },
    //         body: JSON.stringify({ pheadId: pheadId })
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         var subCoaSelect = document.getElementById('sub_coa_head');
    //         subCoaSelect.innerHTML = '<option value="">Select Option</option>';
    //         data.forEach(coa => {
    //             var option = document.createElement('option');
    //             option.value = coa.HeadName;
    //             option.textContent = coa.HeadName;
    //             subCoaSelect.appendChild(option);
    //         });
    //     })
    //     .catch(error => console.error('Error:', error));
    // });

//     function selectparenthead() {
//     var phead = $("#coahead").val();
//     var csrf_token = $('meta[name="csrf-token"]').attr('content'); // Ensure you have CSRF meta tag in your layout
//     var myurl = '{{ route("accounts.selectPhead") }}'; // Replace with your Laravel route
//     var dataString = {
//         phead: phead,
//         _token: csrf_token
//     };

//     $.ajax({
//         type: "POST",
//         url: myurl,
//         data: dataString,
//         success: function(data) {
//             $('#Parentcategory').html(data); // Update the Parentcategory dropdown with returned options
//         },
//         error: function(xhr, status, error) {
//             console.error('Error:', error);
//         }
//     });
// }

// function getheadcode() {
//     var headleabel = $('#Parentcategory option:selected').data('id');
//     var phead = $('#Parentcategory option:selected').data('phead');
//     var headcode = $('#Parentcategory').val();

//     $('#headcode').val(headcode);
//     $('#pheadcode').val(phead);
//     $('#headlebel').val(headleabel);
// }

</script>
@endsection
