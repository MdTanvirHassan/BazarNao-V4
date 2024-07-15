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
                            <select name="coahead" class="form-control" onchange="selectparenthead()" id="coahead">
                                <option value="">{{ translate('Select Option') }}</option>
                                @foreach ($coa_head as $acc)
                                    <option value="{{ $acc->HeadCode }}">{{ $acc->HeadName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="col-sm-2 col-form-label" for="Parentcategory">{{ translate('Sub COA Head') }}</label>
                        <div class="col-sm-4">
                            <select name="headcode" class="form-control" id="Parentcategory" onchange="selectsubparenthead()">
                                <option value="">{{ translate('Select Option') }}</option>
                                {{-- Options dynamically populated based on selected COA Head --}}
                            </select>
                        </div>
                    </div>
                    
                  
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="ParentSubcategory">{{ translate('Sub-Sub COA Head') }}</label>
                        <div class="col-sm-4">
                            <select name="pheadcode" class="form-control" id="ParentSubcategory">
                                <option value="">{{ translate('Select Option') }}</option>
                                {{-- Options dynamically populated based on selected Sub COA Head --}}
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
                            <input class="form-check-input" type="checkbox" name="transaction" value="1" id="flexCheckTransaction">
                            <label class="form-check-label" for="flexCheckTransaction">
                                Transaction
                            </label>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" type="checkbox" name="active" value="1" id="flexCheckActive">
                            <label class="form-check-label" for="flexCheckActive">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="gl_head" value="1" id="flexCheckGLHead">
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

function selectparenthead() {
        var coaheadValue = document.getElementById('coahead').value;
        var parentCategorySelect = document.getElementById('Parentcategory');

        parentCategorySelect.innerHTML = '<option value="">{{ translate('Select Option') }}</option>';

        @foreach ($sub_coa_head as $sub_acc)
            if ('{{ $sub_acc->PHeadCode }}' == coaheadValue) {
                var option = document.createElement('option');
                option.value = '{{ $sub_acc->HeadCode }}';
                option.textContent = '{{ $sub_acc->HeadName }}';
                parentCategorySelect.appendChild(option);
            }
        @endforeach
    }

    function selectsubparenthead() {
        var parentCategoryValue = document.getElementById('Parentcategory').value;
        var parentSubcategorySelect = document.getElementById('ParentSubcategory');

        parentSubcategorySelect.innerHTML = '<option value="">{{ translate('Select Option') }}</option>';

        @foreach ($sub_coa_head as $sub_acc)
            if ('{{ $sub_acc->PHeadCode }}' == parentCategoryValue) {
                var option = document.createElement('option');
                option.value = '{{ $sub_acc->HeadCode }}';
                option.textContent = '{{ $sub_acc->HeadName }}({{ $sub_acc->HeadLevel}})';
                parentSubcategorySelect.appendChild(option);
                @foreach ($sub_coa_head as $sub)
                    if ('{{ $sub->PHeadCode }}' == option.value) {
                        var options = document.createElement('option');
                        options.value = '{{ $sub->HeadCode }}';
                        options.textContent = '-{{ $sub->HeadName }}({{ $sub->HeadLevel}})';
                        parentSubcategorySelect.appendChild(options);

                        @foreach ($sub_coa_head as $sub_sub)
                            if ('{{ $sub_sub->PHeadCode }}' == options.value) {
                                var suboption = document.createElement('option');
                                option2.value = '{{ $sub_sub->HeadCode }}';
                                option2.textContent = '--{{ $sub_sub->HeadName }}({{ $sub_sub->HeadLevel}})';
                                parentSubcategorySelect.appendChild(option2);
                                
                            }
                        @endforeach
                        
                    }
                @endforeach
            }
        @endforeach
    }

</script>
@endsection
