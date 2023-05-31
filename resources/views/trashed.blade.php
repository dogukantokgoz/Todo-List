@include('layouts.header')

<head>
    <title>DodoTodo v2</title>
</head>
<body>
<div class="container mt-4">
    <p><h2>SİLİNENLER</h2>

    @if(count($todos) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Başlık</th>
                <th>
                    <div class="d-flex justify-content-end">Seçenekler</div></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($todos as $todo)
                <tr class="table-light">
                    <td>{{$todo->title}}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('recover', $todo->id)}}" ><button type="submit" name="recover" class="btn btn-primary">Geri Yükle</button></a>
                            <a href="{{route('delete', $todo->id)}}" ><button type="submit" name="recover" class="btn btn-danger">Sil</button></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else

        <h4>Silinen yok<h4>
    @endif
</div>
</div>
</body>


