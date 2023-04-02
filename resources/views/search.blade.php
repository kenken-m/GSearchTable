<!DOCTYPE html>
<html>
<head>
    <title>Google 検索結果 ⼀覧表⽰</title>
    <!-- Bootstrap CSS を読み込む -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="center-block">Google 検索結果 ⼀覧表⽰</h1>
        <form method="GET" action="{{ route('search') }}">
            <div class="input-group mb-3">
                <input type="text" name="query" value="{{ $query ?? '' }}" class="form-control"
                       placeholder="検索ワードを入力してください">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">検索</button>
                </div>
            </div>
        </form>
        @if (isset($items))
            <h2>"{{ $query }}"の検索結果一覧</h2>
            @foreach ($items as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <a href="{{ $item['link'] }}" target="_blank">{{ $item['title'] }}</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>
