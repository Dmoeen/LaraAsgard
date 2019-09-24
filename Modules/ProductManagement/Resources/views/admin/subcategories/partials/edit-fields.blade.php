<div class="box-body">
    <p>
        {!! Form::normalInput('name', 'SubCategory Name',$errors,$subcategory) !!}
        {!! Form::normalCheckbox('status', 'Status', $errors,$subcategory) !!}
    </p>
</div>
