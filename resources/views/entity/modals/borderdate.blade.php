<div class="alert alert-danger borderdate-error-container d-none"></div>

<form class="borderdate-form" action="#">
    @csrf
    <table class="table">
        @foreach($mergeableDates as $mergeableDate)
            <tr>
                <td colspan="4" class="h5 fw-bolder border-0">
                    {{ $mergeableDate['name'] }}
                </td>
            </tr>
            <tr>
                <td rowspan="2" class="align-middle border-black">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="borderdateUid" value="{{ $mergeableDate['uid'] }}"/>
                    </div>
                </td>
                <td class="text-muted">
                    {{ $mergeableDate['startInterval'][0]->format('Y.m.d') }}
                </td>
                <td>
                    <input type="text" class="form-control-sm datepicker" name="date{{ $mergeableDate['uid'] }}" value="{{ $mergeableDate['startInterval'][1]->format('Y.m.d') }}"/>
                </td>
                <td></td>
            </tr>
            <tr class="border-black">
                <td></td>
                <td class="text-muted">
                    {{ $mergeableDate['endInterval'][0]->format('Y.m.d') }}
                </td>
                <td class="text-muted">
                    {{ $mergeableDate['endInterval'][1]->format('Y.m.d') }}
                </td>
            </tr>
        @endforeach
    </table>
</form>
