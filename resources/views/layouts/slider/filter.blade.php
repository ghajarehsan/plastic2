<div class="filter">

    <div class="filter-header">

        <h3>فیلتر کنید </h3>

    </div>

    <div class="filter-first-header">
        <p>براسال نوع محصول </p>
    </div>

    <div class="filter-first-content mt-3">

        <div class="row">

            @foreach(\App\Lib\Helper::getcategory() as  $keycategory=>$rowcategory)

                <div class="col-lg-6 brand">

                    <div>

                        <input type="checkbox" class="form-check-input" v-model="firstfilter"
                               value="{{$rowcategory->id}}">

                        <span>{{$rowcategory->name}}</span>

                    </div>

                </div>

            @endforeach

        </div>

    </div>


</div>
