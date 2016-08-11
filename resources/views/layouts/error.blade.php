<div id="error">
    @if (count($errors) > 0)
        <ul class="cols">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>