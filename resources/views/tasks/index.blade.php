<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{ route('tasks_store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-primary"></i> Добавить задачу
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Текущие задачи -->
@if (count($tasks) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Текущая задача
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <!-- Заголовок таблицы -->
            <thead>
                <tr>
                    <th>Задача</th>
                    <th>Удалить</th>
                    <th>Редактировать</th>
                </tr>         
            </thead>
            <!-- Тело таблицы -->
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <!-- Имя задачи -->
                    <td class="table-text">
                        <div>{{ $task->name }}</div>
                    </td>
                    <td>
                        <form action="{{route('tasks_destroy',$task->id)}} " method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn-default bg-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>                        
                    </td>
                    <td>
                        <form action="{{ route('tasks_edit',$task->id) }}" method="post" class="form-horizontal">
                            {{csrf_field()}}
                            {{method_field('get')}}
                            <button type="submit" class="btn btn-default bg-success">
                                <i class="fa fa-edit"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection