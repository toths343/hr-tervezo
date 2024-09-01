<div class="alert alert-danger split-error-container d-none"></div>

<form class="split-form" action="#">
    @csrf
    <table class="table">
        <tr>
            <td class="align-middle">{{ $hatkezd->format('Y.m.d') }}</td>
            <td>
                <input type="text" class="form-control datepicker" name="splitDate" value=""/>
            </td>
            <td class="align-middle">{{ $hatvege->format('Y.m.d') }}</td>
        </tr>
    </table>
</form>

{!! $displayView !!}
