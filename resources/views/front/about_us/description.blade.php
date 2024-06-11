<section class="feature_part section_padding">
            @php
use App\Models\front\Ability;
use App\Models\front\OurGoal;
$abilities=Ability::all();
            @endphp
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>{{$our_goal->right_description}}</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>{{$our_goal->left_description}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($abilities as $ability)
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img alt="#" src="{{$ability->icon}}">
                        <h4>{{$ability->title}}</h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>