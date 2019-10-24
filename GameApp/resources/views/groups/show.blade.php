@extends('layouts.app')
@section('content')
    <!--<h2 class="text-center">{{$group->name}}</h2>

        <p class="gInfo">{{$group->type}} | {{$group->game_id}} </p>
    <div class="grpimgFeature">
        <img src="{{asset($group->grp_image)}}">
    </div>
    <p>{{$group->description}}</p>
    
    <br>
    <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>
    <a href="{{route('usergroups.store',$group->id)}}" class="btn btn-primary float-right">Join</a>
    <br><br>

 <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
    <div class="clearfix"></div>
              
                 
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-description">
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" class="deleteF" action="{{route('groups.destroy',$group->id)}}" class="hide">
        @csrf
        @method('DELETE')
    </form>-->
    <!--<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            <h2 class="text-center">{{$group->name}}</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <img src="{{asset($group->grp_image)}}" style="display:block; margin-left: auto; margin-right: auto;">
		</div>
	</div>
    <br>
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<h4>
						Group game:
					</h4>
					<h4>
                       <b> {{$group->game_id}} </b>
					</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h4>
						Group type: <br> <b> {{$group->type}}</b>
					</h4>
					<p>
                    {{$group->description}}					
                    </p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
        <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>
    <a href="{{route('usergroups.store',$group->id)}}" class="btn btn-primary float-right">Join</a>
    <br><br>

 <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
    <div class="clearfix"></div>
              
                 
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-description">
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" class="deleteF" action="{{route('groups.destroy',$group->id)}}" class="hide">
        @csrf
        @method('DELETE')
    </form>
		</div>
	</div>
</div>-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
            <div class="col-md-12">
            <h2>
                    {{$group->name}}
			</h2>
				</div>
				<div class="col-md-3">					
					<p>
                    <b>Group Game:<br>
                    <h3>{{$group->game_id}}</h3><br>
                    Group type:<br>
                    <h3>{{$group->type}}</h3></b><br>

                    {{$group->description}}
					</p>
				</div>
				<div class="col-md-6">
                    <img src="{{asset($group->grp_image)}}" style="display:block; margin-left: auto; margin-right: auto;">
				</div>
				<div class="col-md-3">
                <a href="{{route('groups.edit',$group->id)}}" class="btn btn-primary float-right">Update</a>
    <br><br>
    <a href="{{route('usergroups.store',$group->id)}}" class="btn btn-primary float-right">Join</a>
    <br><br>

 <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
    <div class="clearfix"></div>
              
                 
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-description">
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" class="deleteF" action="{{route('groups.destroy',$group->id)}}" class="hide">
        @csrf
        @method('DELETE')
    </form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection