@if(session()->has('failure'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            <li>
                {{ session()->get('failure') }}
            </li>
        </ul>
    </div>
@endif
