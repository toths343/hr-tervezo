<span>{{ __('layout.date_picker') }}:</span>
<input type="text" name="actDate" value="{{ session()->get('actDate')->format('Y.m.d') }}">

<span class="ms-3">{{ __('layout.display') }}:</span>
<input type="text" name="startDate" value="{{ session()->get('startDate')->format('Y.m.d') }}">
<input type="text" name="endDate" value="{{ session()->get('endDate')->format('Y.m.d') }}">
