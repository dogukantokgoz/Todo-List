@include('layouts.header')

<head>
    <title>DodoTodo v2</title>
</head>
<body>

<div class="container mt-4">
    <p><h2>Yapılacaklar Listesi</h2>
    <div class="d-flex justify-content-end">
        <a href="{{route('create')}}"><button type="button" name="create" class="btn btn-dark">Oluştur</button></a>
    </div>
    </p>

    @if(count($todos) > 0)


    <table class="table">
        <thead>
        <tr>
            <th>Başlık</th>
            <th>Oluşturulma Tarihi</th>
            <th>Durum</th>
            <th>Seçenekler</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($todos as $todo)
        <tr class="@if($todo->status == 0)table-dark @else table-success @endif">
            <td>{{$todo->title}}</td>
            <td>{{$todo->created_at->diffForHumans()}}</td>
            <td>@if($todo->status == 0) Devam Ediyor @else Tamamlandı @endif</td>
            <td>
                <a href="{{route('edit', $todo->id)}}"><button type="button" class="btn btn-primary">Düzenle</button></a>
                <a href="{{route('show', $todo->id)}}"><button type="button" class="btn btn-secondary">Göster</button></a>
                <form style="display:inline-block" method="post" action="{{route('destroy')}}" class="inner">
                    @csrf
                    @method('DELETE')
                    <button value="{{$todo->id}}" type="submit" name="todo_id" class="btn btn-danger">Sil</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
   <h4> Liste Boş<h4>
    @endif
</div>
</div>
</body>


