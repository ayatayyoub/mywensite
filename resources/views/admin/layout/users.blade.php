@extends('admin.layout.app')
@section('content')
<div class="container">
<div class="card card-custom gutter-b ">
<div class="card-header">

												<div class="card-toolbar">
													<div class="example-tools justify-content-center">
													<a class="btn btn-primary" href="{{route('admin.users.create')}}" > Create New Admin</a>
                                                </div>
												</div>
											</div>
<div class="card-header">
<div class="card-title">
<h3 class="card-label">Admins List</h3>
</div>
</div>
<div class="card-body ">
<table class="table">

    <thead>
        <tr>
          <td>id</td>
          <td>name</td>
          <td>email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
            <td><a href="{{route('admin.users.edit',$user->id)}}">
                 <i class="fa fa-pen"></i>
                </a></td>
       </tr>

        @endforeach
    </tbody>
</table>
											</div>
										</div>
</div>
@endsection
