    <x-layout>
{{-- sezione chi siamo --}}
    <section class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="c-section-title m-0 ">Chi Siamo</h3>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    @foreach ($teamMembers as $member)
                        <div class="col-12 col-md-4 mb-5">
                            <img src="{{ asset($member['image']) }}" class="c-img-3 rounded-5""
                                alt="{{ $member['name'] }}">
                            <div class="ps-2">
                                <h5 class="c-card-title w-100  pt-3 text-capitalize">{{ $member['name'] }}</h5>
                                <p class="c-card-price w-100  pt-2 text-capitalize">{{ $member['role'] }}</p>
                                <p class="c-card-price w-100  pt-2 text-capitalize">{{ $member['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- sezione mission --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6 mb-3">
                    <h2 class="c-card-title mb-2">Mission</h2>
                    <p class="c-card-text">La nostra missione è rendere l’acquisto e la vendita tra privati in maniera semplice, veloce e sicura. Offriamo una piattaforma intuitiva che mette in contatto venditori e acquirenti, facilitando la compravendita di prodotti in modo diretto e senza complicazioni. Con il nostro servizio, basta un clic per trovare l’offerta giusta o raggiungere il cliente ideale.</p>
                </div>
                <div class="col-6 mb-3">
                    <h2 class="c-card-title mb-2">Value</h2>
                    <p class="c-card-text">Offriamo un’esperienza di compravendita unica, caratterizzata da semplicità, velocità e sicurezza. La nostra piattaforma elimina le barriere tra venditori e acquirenti, permettendo transazioni rapide e senza fronzoli. La facilità di utilizzo e la possibilità di concludere affari in modo diretto fanno della nostra piattaforma una scelta ideale per chi cerca soluzioni rapide e convenienti.</p>
                </div>
                <div class="col-6 mb-3">
                    <h2 class="c-card-title mb-2">Vision</h2>
                    <p class="c-card-text">Diventare il punto di riferimento per la compravendita tra privati, creando una comunità globale in cui ogni transazione è semplice, trasparente e vantaggiosa. Vogliamo abbattere le barriere del mercato tradizionale, offrendo a tutti l’opportunità di concludere affari in modo rapido e sicuro, rendendo ogni scambio un’esperienza positiva e senza complicazioni.</p>
                </div>
                <div class="col-6 mb-3">
                    <h2 class="c-card-title mb-2">A chi è rivolto?</h2>
                    <p class="c-card-text">Ci rivolgiamo a privati, piccole imprese e appassionati di affari che cercano un modo semplice e sicuro per concludere transazioni dirette, senza intermediari.</p>
                </div>
            </div>
        </div>
    </section>
</x-layout>