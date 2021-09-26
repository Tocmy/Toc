{!! Form::select('company.name',__('Choose Store Name'))->option($companies->preprend(__('Choose Store Name'), ''))->multiple() !!}

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="image_label">Image</label>
        <div class="input-group">
            <input type="text" id="image_label" class="form-control" name="image"
                   aria-label="Image" aria-describedby="button-image">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
            </div>
        </div>
    </div>
</div><!--image-->
