<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Todo') }}
        </h2>
    </x-slot>


    <x-slot name="slot">


        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2></h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('todos.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('todos.store') }}" method="POST">
            @csrf



            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>user:</strong>
                        <select name="user_id" class="form-control" placeholder="status">
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name."-".$user->email}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Task:</strong>
                        <input type="text" name="task" class="form-control" placeholder="Task">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <select name="status" class="form-control" placeholder="status">
                            <option value="0">pending</option>
                            <option value="1">complete</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
        </div>

    </x-slot>

</x-app-layout>