<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>



    <x-slot name="slot">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2></h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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

        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')



            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input value="{{ $user->name }}" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input id="email" value="{{ $user->email }}" class="block mt-1 w-full" type="email" name="email" required />
                </div>




                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="block font-medium text-sm text-gray-700" for="type">
                            User Type
                        </label>
                        <select name="type" class="form-control" placeholder="User Type">
                            <option value="0" {{ $user->type=="user"?"selected":"" }}>User</option>
                            <option value="1" {{ $user->type=="admin"?"selected":"" }}>Admin</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </x-slot>


</x-app-layout>