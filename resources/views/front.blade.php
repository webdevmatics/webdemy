@extends('layouts.app')

@section('content')

    <div class="container">
        <section>
            <div>
                <b-jumbotron header="BootstrapVue" lead="Bootstrap v4 Components for Vue.js 2">
                    <p>For more information visit website</p>
                    <b-button variant="primary" href="{{route('series.index')}}">Browse Course</b-button>
                </b-jumbotron>
            </div>
        </section>

        <section class="mb-5">
            <div>
                <h3 class="mb-3 text-center">Become full stack developer</h3>

                <b-card-group deck>
                    @foreach($featuredSeries as $series)
                        <b-card class="text-center" title="{{$series->title}}" img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top>
                            <b-card-text>
                                @php $excerpt = \Str::words($series->description, 10) @endphp

                                {!! $excerpt !!}
                            </b-card-text>
                            <template v-slot:footer>
                                <b-button  href="{{route('series.show', $series)}}" variant="primary">Play</b-button>
                            </template>
                        </b-card>
                    @endforeach
                    </b-card-group>
            </div>
        </section>

        <section>
            <h3 class="mb-3 text-center">Choose Plan that fits your need</h3>

            <pricing></pricing>

        </section>




    </div>


@endsection