@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Chart Of Account Create')}}</h5>
            </div>

            <form class="form-horizontal" action="{{ route('chart_of_accounts.store') }}" method="POST" enctype="multipart/form-data">
            	@csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name">{{translate('COA Head')}}</label>
                        <div class="col-sm-9">
                            <select name="coa_head" id="coa_head" class="form-control">
                                <option value="">Select Option</option>
                                @foreach ($query as $acc)
                                    <option value="{{ $acc->id }}">{{ $acc->HeadName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="name">{{translate('')}}</label>
                        <div class="col-sm-9">
                            <select name="coa_head" id="coa_head" class="form-control">
                                <option value="">Select Option</option>
                                @foreach ($query as $acc)
                                    <option value="{{ $acc->id }}">{{ $acc->HeadName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-from-label" for="email">{{translate('Head Name')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Head Name')}}" id="head_name" name="head_name" class="form-control">
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Transaction
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          Active
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          GL Head
                        </label>
                      </div>
                   

                    

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        <a href="{{route('chart_of_accounts.index')}}" class="btn btn-sm btn-danger">
                            <span class="aiz-side-nav-text">{{translate('Go Back')}}</span>
                        </a>
                    </div>


                </div>
            </form>

        </div>
    </div>
</div>

@endsection


