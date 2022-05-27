{{-- layouts/partials/mensajes --}}

{{-- Mensajes de error --}}

@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger text-left">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- @if ($errors->has('password'))
    <li class="list-unstyled mb-0"> {{ $errorPass }} </li>
@endif
@if ($errors->has('email'))
    <li class="list-unstyled mb-0"> {{ 'hola' }} </li>
@endif --}}



{{-- @if (Session::get('success', false))
    <?php //$data = Session::get('success');
    ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-success text-left">
                <i class="fa fa-check"></i>
                {{ $message }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success text-left">
            <i class="fa fa-check"></i>
            {{ $message }}
        </div>
    @endif
@endif --}}
