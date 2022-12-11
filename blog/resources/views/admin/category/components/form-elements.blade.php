<div class="form-group row align-items-center" :class="{'has-danger': errors.has('namecategory'), 'has-success': fields.namecategory && fields.namecategory.valid }">
    <label for="namecategory" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.category.columns.namecategory') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.namecategory" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('namecategory'), 'form-control-success': fields.namecategory && fields.namecategory.valid}" id="namecategory" name="namecategory" placeholder="{{ trans('admin.category.columns.namecategory') }}">
        <div v-if="errors.has('namecategory')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('namecategory') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('slug'), 'has-success': fields.slug && fields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.category.columns.slug') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('slug'), 'form-control-success': fields.slug && fields.slug.valid}" id="slug" name="slug" placeholder="{{ trans('admin.category.columns.slug') }}">
        <div v-if="errors.has('slug')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('slug') }}</div>
    </div>
</div>


