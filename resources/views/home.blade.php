<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center" >
        <form action="{{route('filter')}}" style="margin-top: 20px;" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="seriia">Серия паспорта</label>
                <input type="text" id="seriia" name="seriia" class="form-control">
            </div>
            <div class="form-group">
                <label for="number">Номер паспорта</label>
                <input type="text" id="number" name="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="spec">Компания</label>
                <select name="company" id="spec" class="form-control">
                    @php
                        $companies = $paginator->unique('company');
                        $specialization =  $paginator->unique('role');
                    @endphp
                    <option value="" default>Выберите компанию</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->company }}">{{ $company->company }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="spec">Специальность</label>
                <select name="role" id="spec" class="form-control">
                    <option value="" default>Выберите специальность</option>
                    @foreach($specialization as $role)
                        <option value="{{ $role->role }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Дата рождения</label>
                <input type="date" id="date" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="date">Отсорт</label>
                <input type="date" id="date" name="date_end" class="form-control">
            </div>

<button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <div class="col-md-12">
            <h2>Все рабочие</h2>
            <div class="card">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Компания</th>
                        <th scope="col">Специальность</th>
                        <th scope="col">Номер</th>
                        <th scope="col">Серия</th>
                        <th scope="col">Дата рождения</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paginator as $worker)
                        <tr>
                            <th scope="row">{{ $worker->id }}</th>
                            <td><b>{{ $worker->first_name }}</b></td>
                            <td>{{ $worker->last_name }}</td>
                            <td>{{ $worker->company }}</td>
                            <td>{{ $worker->role }}</td>
                            <td>{{ $worker->number }}</td>
                            <td>{{ $worker->series }}</td>
                            <td> {{ $worker->birthday }}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{ $paginator }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</html>
