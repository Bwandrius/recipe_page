
@if ($message = Session::get('success'))
    <br>
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
