<form method="post" action="{{ route('changeDate') }}" class="d-flex align-items-center gap-2">
    @csrf

    <span>{{ __('layout.date_picker') }}:</span>
    <input type="text" class="form-control form-control-sm" name="actDate" value="{{ session()->get('actDate')->format('Y.m.d') }}">

    <span class="ms-3">{{ __('layout.display') }}:</span>
    <input type="text" class="form-control form-control-sm" name="startDate" value="{{ session()->get('startDate')->format('Y.m.d') }}">
    <span class="">&nbsp;-&nbsp;</span>
    <input type="text" class="form-control form-control-sm" name="endDate" value="{{ session()->get('endDate')->format('Y.m.d') }}">

    <button class="btn btn-primary btn-sm" type="submit">
        {{ __('layout.display') }}
    </button>
</form>

@if ($errors->has('actDate') || $errors->has('startDate') || $errors->has('endDate'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
