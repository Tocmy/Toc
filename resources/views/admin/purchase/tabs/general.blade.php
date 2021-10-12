<!--Tamtamcrm--->

{!! Form::fieldsetOpen(__('Supplier')) !!}
{!! Form::select('supplier',__('Supplier Name '))->option($supplier->preprend(__('Please Choose'), ''))->multiple() !!}
{!! Form::fieldsetClose() !!}


