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
                       
                    </div>
                </div>
            </form>
        </div>
    </div>
  

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
                    options += `<option value="${item.HeadCode}" data-level="${item.HeadLevel}">${indent}-${item.HeadName} (${item.HeadLevel})</option>`;
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


</script>
@endsection

<script>

function fetchSubCoaHeads(headCode, dropdown, headName, headLevel = 1) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var url = '{{ route("accounts.selectPhead") }}';

    $.ajax({
        type: 'POST',
        url: url,
        data: { phead: headCode, _token: csrfToken },
        success: function(data) {
            console.log('Response data:', data);
            var options = `<option value="">${headName} - ${translate('Select Option')}</option>`;
            if (Array.isArray(data)) {
                data.forEach(function(item) {
                    options += buildOption(item, headLevel);
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

function buildOption(item, level) {
    var indent = '&nbsp;'.repeat(level * 4);
    var option = `<option value="${item.HeadCode}" data-level="${item.HeadLevel}">${indent}-${item.HeadName} (${item.HeadLevel})</option>`;
    if (item.subcategories) {
        item.subcategories.forEach(function(subitem) {
            option += buildOption(subitem, level + 1);
        });
    }
    return option;
}

function selectParentHead() {
    var coaheadValue = document.getElementById('coahead').value;
    var parentCategorySelect = document.getElementById('Parentcategory');
    var headName = $('#coahead option:selected').text();
    var headLevel = $('#coahead option:selected').data('level');

    parentCategorySelect.innerHTML = '<option value="">{{ translate('Select Option') }}</option>';
    fetchSubCoaHeads(coaheadValue, parentCategorySelect, headName, headLevel);
}

function selectSubParentHead() {
    var parentCategoryValue = document.getElementById('Parentcategory').value;
    var parentSubcategorySelect = document.getElementById('ParentSubcategory');
    var headName = $('#Parentcategory option:selected').text();
    var headLevel = $('#Parentcategory option:selected').data('level');

    parentSubcategorySelect.innerHTML = '<option value="">{{ translate('Select Option') }}</option>';
    fetchSubCoaHeads(parentCategoryValue, parentSubcategorySelect, headName, headLevel);
}

function translate(key) {
    return key; // Implement your translation logic if needed
}


</script>