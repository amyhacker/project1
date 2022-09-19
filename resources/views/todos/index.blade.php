<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>



    <x-slot name="slot">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('todos.create') }}"> Create New Todo</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>User </th>
                    <th>Task</th>
                    <th>Satus</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                <tr>
                    <td>{{ $todo->id }}</td>
                    <td>{{ $todo->user->name }}</td>
                    <td>{{ $todo->task }}</td>
                    <td>{{ $todo->status?"Complete":"Pending" }}</td>
                    <td>
                        <form action="{{ route('todos.destroy',$todo->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('todos.edit',$todo->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $todos->links() !!}

    </x-slot>


</x-app-layout>