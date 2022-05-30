
@if (isset($errors) && count($errors) > 0)
<div class="container">
    <div class="alert alert-danger text-center">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    </div>
@endif