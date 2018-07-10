@extends('welcome')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Complete</th>
                <th>Title</th>
                <th>Completed</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>
                    <label for="">@{{completed}}</label>
                    <input type="checkbox" value="{{$task->id}}" @change="complete" v-model="completed">
                </td>
                <td scope="row"><a href="/task/{{$task->id}}">{{$task->title}}</a></td>
                <td>{{ $task->completed ? 'Completed': 'To-Do' }}</td>
                <td><a href="/task/{{$task->id}}/edit">Edit</a></td>
                <td>
                <form action="/task/{{$task->id}}/delete" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection