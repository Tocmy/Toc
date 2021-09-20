{!! Form::radio('allow_comment', __('Allow To Comment')) !!}
{!! Form::text('author', __('Author of this article')) !!}

{!! Form::select('category.name',__('Choose Topic'))->option($categories->preprend(__('Please Select'), ''))->multiple() !!}
{!! Form::select('product.name',__('Choose Product'))->option($products->preprend(__('Please Select'), ''))->multiple() !!}
