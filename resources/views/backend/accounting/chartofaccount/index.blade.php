@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/dist/themes/default/style.min.css') }}" />
<link rel="stylesheet" href="{{ asset('application/modules/account/assets/css/style.css') }}" />

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    {{ $title }}
                </div>
            </div>

            <div class="panel-body">                       
                <div class="row">
                    <div class="col-md-6">
                        <div id="jstree1">
                            <ul>
                              <?php 
                              $visit = array_fill(0, count($userList), false);
                              (new \App\Models\ChartOfAccount)->dfs("COA", "0", $userList, $visit, 0); 
                              ?>
                            </ul>
                        </div>
                    </div> 
                    <div class="col-md-6" id="newform"></div>
                </div>
            </div> 
        </div>
    </div> 
    <input type="hidden" id="base_url" value="{{ url('/') }}" name="base_url">
</div>
<script src="{{ asset('assets/dist/jstree.min.js') }}" ></script>
<script src="{{ asset('assets/dist/account.js') }}" type="text/javascript"></script>
@endsection
