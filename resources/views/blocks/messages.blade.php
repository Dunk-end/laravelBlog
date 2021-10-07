@if($errors->any())
    <div class="errors">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="success">
        <ul>
            <li>{{ session('success') }}</li>
        </ul>
    </div>
@endif


@if(session('error'))
    <div class="errors">
        <ul>
            <li>{{ session('error') }}</li>
        </ul>
    </div>
@endif
