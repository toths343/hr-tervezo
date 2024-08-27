<form method="post" action="{{ route('changeDate') }}">
    @csrf

    <span class="small">{{ __('layout.date_picker') }}:</span>
    <input type="text" class="form-control-sm" name="actDate" value="{{ session()->get('actDate')->format('Y.m.d') }}">

    <span class="small ms-3">{{ __('layout.display') }}:</span>
    <input type="text" class="form-control-sm" name="startDate" value="{{ session()->get('startDate')->format('Y.m.d') }}">
    <input type="text" class="form-control-sm" name="endDate" value="{{ session()->get('endDate')->format('Y.m.d') }}">

    <button class="btn btn-primary" type="submit">
        {{ __('layout.display') }}
    </button>

</form>
