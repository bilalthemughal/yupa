<div class="row">
    <legend class="text-bold">
        <button type="button" class="btn btn-primary" id="add_option{{$number}}" onclick="appendFunction({{$number}})" data-action="add">Add Itinary(+)</button>
    </legend>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Day Number:</label>
                <input type="text" name="number[]" id="name" class="form-control" placeholder="Number">

            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tbody id="{{$number}}_way_body">
        <tr>
            <td>
                <input type="time" name="time{{$number}}[]" id="time1" class="form-control" placeholder="Itinary Time">
            </td>
            <td >
                <input type="text" name="itinary_name{{$number}}[]" id="itinary_name1" class="form-control" placeholder="Itinary Name">
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-xs " >-</button>
            </td>
        </tr>
        </tbody>
    </table>

</div>