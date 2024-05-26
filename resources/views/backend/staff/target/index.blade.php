@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('All Target')}}</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="{{ route('targets.create') }}" class="btn btn-circle btn-info">
				<span>{{translate('Add Target')}}</span>
			</a>
		</div>
	</div>
</div>

<div class="card">
    <form id="culexpo" class="" action="" method="GET">
        <div class="card-header row gutters-5">

            <div class="col-md-3">
                <label>Filter By Employee :</label>
                    <select class="form-control" name="user_id" id="user_id">
                        <option value="">Select One</option>
                        @foreach(\App\Models\Staff::get() as $executive) 
        
                        <option value="{{$executive->user_id}}"@if($user_id == $executive->user_id) selected @endif >{{ $executive->user->name}}</option>
                        @endforeach
                    </select>
            </div>


            <div class="col-md-3">
                <label class="col-sm-9 col-from-label" for="name">{{ translate('Month') }}</label>
                <input type="text" placeholder="{{ translate('Month') }}" id="month" name="month" class="form-control monthpicker" value="{{ !empty($month) ? $month : '' }}">
            </div>


            <div class="col-auto">
                <div class="form-group mb-0">
                    <button class="btn btn-sm btn-primary" onclick="submitForm ('{{ route('targets.index') }}')">{{ translate('Filter') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Targets')}}</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{translate('Name')}}</th>
                    <th>{{translate('Email')}}</th>
                    <th>{{translate('Phone')}}</th>
                    <th>{{translate('Year')}}</th>
                    <th>{{translate('Month')}}</th>
                    <th>{{translate('Target Amount')}}</th>
                    <th>{{translate('Target New Customer')}}</th>
                    <th>{{translate('Recovery Target')}}</th>
                  
                    <th>{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($targets as $key => $target)
                    @if($target->user != null)
                        <tr>
                            <td>{{ ($key+1) + ($targets->currentPage() - 1)*$targets->perPage() }}</td>
                            <td>{{$target->user->name}}</td>
                            <td>{{$target->user->email}}</td>
                            <td>{{$target->user->phone}}</td>
                            <td>{{$target->year}}</td>
                            <td>{{$target->month}}</td>
                            <td>{{$target->target}}</td>
                            <td>{{$target->terget_customer}}</td>
                            <td>{{$target->recovery_target}}</td>
                            
                            <td class="text-right">
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('targets.edit', encrypt($target->id))}}" title="{{ translate('Edit') }}">
                                        <i class="las la-edit"></i>
                                    </a>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('targets.destroy', $target->id)}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
                                  
		                        </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $targets->appends(request()->input())->links() }}
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
