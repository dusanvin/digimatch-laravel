@extends ('layouts.app')

@section('content')

<div class="flex flex-row h-full mx-0 sm:mx-5 mt-1 sm:mt-10 mb-1 sm:mb-10">

    <!-- Nav -->

    @include('layouts.navigation')

    <!-- Nav -->

    <!-- Content -->

    <div class="px-1 md:px-8 py-1 md:py-8 text-gray-700 w-screen sm:rounded-r-lg" style="background-color: #EDF2F7;">

        <div class="mx-auto rounded">

            <!-- Tabs -->

            <ul id="tabs" class="inline-flex w-full">

                <li class="px-4 py-2 -mb-px font-medium text-xs sm:text-sm text-gray-800 border-b-2 border-gray-700 rounded-t opacity-50 bg-white border-b-4 -mb-px opacity-100"><a href="{{ route('offers.all') }}">Alle Angebote</a></li>

                @role('Admin|Moderierende|Helfende')

                <li class="px-4 py-2 font-medium text-xs sm:text-sm text-gray-800 rounded-t opacity-50 bg-white border-gray-400"><a href="{{ route('offers.user') }}">Meine Angebote</a></li>

                <li class="px-4 py-2 font-medium text-xs sm:text-sm text-gray-800 rounded-t opacity-50 bg-white border-gray-400"><a href="{{ route('offers.make') }}">Angebot erstellen</a></li>

                @endrole

            </ul>

            <!-- Tabs -->

            <!-- Tab Contents -->

            <div id="tab-contents">

                <!-- Alle Angebote -->

                <div id="first" class="px-4 pt-4 pb-2 bg-white mb-4 rounded-b-md">

                    <!-- <div class="grid grid-cols-1 text-sm text-gray-500 text-light py-1 my-2">

                        <p class="font-medium text-gray-800 leading-none text-lg leading-6">Angebotsübersicht</p>

                        <p class="text-sm text-gray-500 mt-1 mb-3 mt-2">Erhalten Sie eine Übersicht über alle aktiven Angebote. Fragen Sie ein Angebot an, um Ihr Interesse zu bekunden. Sollte Ihnen ein Angebot gefallen, können Sie dieses gern liken.</p>

                    </div> -->

                    <!-- Suchfilter -->

                    <div class="grid grid-cols-1 text-sm text-gray-500 text-light py-1 my-2">

                        <p class="font-medium text-gray-800 leading-none text-lg leading-6">

                            Suchfilter

                        </p>

                        <!-- Jumbatron -->

                        <div class="rounded-sm flex flex-row-reverse">

                            <details class="flex-auto">

                                <summary class="cursor-pointer text-sm text-gray-500 mt-1 mb-3 mt-2">

                                    Suchen Sie nach aktiven Angeboten.

                                </summary>

                                <!-- Details -->

                                <form action="{{ route('offers.all') }}" method="post">

                                    @csrf

                                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 mb-6">

                                        <!-- Betreuungsrahmen -->

                                        <div class="grid grid-cols-1 text-sm text-gray-500 text-light mt-3">

                                            <p class="font-medium text-gray-800 leading-none mb-3">Betreuungsrahmen</p>

                                            <!--<p class="text-xs text-gray-500 mt-1 mb-3">Ändern Sie, bis zu wieviele Personen betreut werden sollen.</p>-->

                                            <div>

                                                <label for="rahmen" class="sr-only flex items-center">rahmen</label>

                                                <select name="rahmen" id="rahmen" class="text-gray-500 text-xs py-1 pl-2 pr-8 rounded-sm border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent @error('rahmen') border-red-500 @enderror">
                                                    <option>Beliebig</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>

                                                <script>
                                                    var rahmen_select = document.getElementById("rahmen");
                                                    rahmen_select.value = '{{ $rahmen }}';
                                                </script>

                                            </div>

                                        </div>

                                        <!-- Betreuungsrahmen -->

                                        <!-- Schulart -->

                                        <div class="grid grid-cols-1 text-sm text-gray-500 text-light mt-3">

                                            <p class="font-medium text-gray-800 leading-none mb-3">Schulart</p>

                                            <!--<p class="text-xs text-gray-500 mt-1 mb-3">Ändern Sie, welche Schule Sie bevorzugen.</p> -->

                                            <div>

                                                <label for="rahmen" class="sr-only flex items-center">schulart</label>

                                                <select name="schulart" id="schulart" class="text-gray-500 text-xs py-1 px-2 rounded-sm border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent @error('schulart') border-red-500 @enderror">
                                                    <option>Beliebig</option>
                                                    <option>Grundschule</option>
                                                    <option>Mittelschule</option>
                                                    <option>Realschule</option>
                                                    <option>Gymnasium</option>
                                                    <option>Weitere</option>
                                                </select>

                                                <script>
                                                    var schulart_select = document.getElementById("schulart");
                                                    schulart_select.value = "{{ $schulart }}";
                                                </script>

                                                @error('schulart')

                                                <div class="text-red-500 mt-2 text-sm">

                                                    {{ 'Bitte legen Sie fest, welche Schule Sie bevorzugen.' }}

                                                </div>

                                                @enderror

                                            </div>

                                        </div>

                                        <!-- Schulart -->

                                        <!-- Fremdsprachkenntnisse -->

                                        <div class="grid grid-cols-1 text-sm text-gray-500 text-light mt-3">

                                            <p class="font-medium text-gray-800 leading-none mb-3">Fremdsprachkenntnisse</p>

                                            <!--<p class="text-xs text-gray-500 mt-1 mb-3">Ändern Sie Angaben zur Fremdsprache, die das Betreuungsverhältnis ergänzen könnte.</p>-->

                                            <div>

                                                <label for="sprachkenntnisse" class="sr-only flex items-center">Sprachkenntnisse</label>

                                                <select name="sprachkenntnisse" id="sprachkenntnisse" class="text-gray-500 text-xs py-1 px-2 rounded-sm border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent @error('sprachkenntnisse') border-red-500 @enderror">
                                                    <option>Beliebig</option>
                                                    @foreach ($languages as $language)
                                                    <option>{{ $language->Sprache }}</option>
                                                    @endforeach
                                                </select>

                                                <script>
                                                    var sprachkenntnisse_select = document.getElementById("sprachkenntnisse");
                                                    sprachkenntnisse_select.value = "{{ $sprachkenntnisse }}";
                                                </script>

                                            </div>

                                        </div>

                                        <!-- Fremdsprachkenntnisse -->

                                        <!-- Studiengang -->

                                        <div class="grid grid-cols-1 text-sm text-gray-500 text-light mt-3">

                                            <p class="font-medium text-gray-800 leading-none mb-3">Studiengang</p>

                                            <!--<p class="text-xs text-gray-500 mt-1 mb-3">Aktualisieren Sie Ihren Studiengang.</p>-->

                                            <div>

                                                <label for="studiengang" class="sr-only flex items-center">studiengang</label>

                                                <select name="studiengang" id="studiengang" class="text-gray-500 text-xs py-1 px-2 rounded-sm border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent @error('studiengang') border-red-500 @enderror">
                                                    <option>Beliebig</option>
                                                    <option>Hauptfach Deutsch als Zweit- und Fremdsprache (B.A.)</option>
                                                    <option>Nebenfach Deutsch als Zweit- und Fremdsprache (B.A.)</option>
                                                    <option>Grundschule (LA)</option>
                                                    <option>Mittelschule (LA)</option>
                                                    <option>Realschule (LA)</option>
                                                    <option>Gymnasium (LA)</option>
                                                    <option>Sonstiges</option>
                                                </select>

                                                <script>
                                                    var studiengang_select = document.getElementById("studiengang");
                                                    studiengang_select.value = "{{ $studiengang }}";
                                                </script>

                                            </div>

                                        </div>

                                        <!-- Studiengang -->

                                        <!-- Datum -->

                                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

                                        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">

                                        <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>

                                        <script src="https://npmcdn.com/flatpickr/dist/l10n/de.js"></script>


                                        <div class="grid grid-cols-1 text-sm text-gray-500 text-light mt-3">

                                            <p class="font-medium text-gray-800 leading-none mb-3">Betreuungszeitraum</p>

                                            <!--<p class="text-xs text-gray-500 mt-1 mb-3">Wählen Sie einen Betreuungszeitraum.</p>-->

                                            <label for="datum" class="sr-only flex items-center">Datum</label>

                                            <div>

                                                <input class="text-gray-500 text-xs py-1 px-2 rounded-sm border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent @error('sprachkenntnisse') border-red-500 @enderror" type="text" id="datum" name="datum">

                                                <script type="text/javascript">
                                                    var $flatpickr = flatpickr("#datum", {
                                                        altInput: true,
                                                        altFormat: "F Y", // was "j F, Y"
                                                        dateFormat: "Y-m-d", // was "Y-F"
                                                        theme: "dark",
                                                        //minDate: "today",
                                                        mode: "range",
                                                        "locale": "de",
                                                        defaultDate: ['{{ $startDate }}', '{{ $endDate }}']
                                                    });

                                                    function resetDate() {
                                                        $flatpickr.clear();
                                                    }
                                                </script>

                                                <button onclick="resetDate()">

                                                    <div class="hover:text-gray-700">

                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 h-5 w-5 inline-block align-text-bottom" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                                        </svg>

                                                        Zurücksetzen

                                                    </div>

                                                </button>

                                            </div>

                                        </div>

                                        <!-- Datum -->

                                        <!-- Fachsemester -->

                                        <div class="grid grid-cols-1 text-sm text-gray-500 text-light mt-3">

                                            <p class="font-medium text-gray-800 leading-none mb-3">Fachsemester</p>

                                            <!--<p class="text-xs text-gray-500 mt-1 mb-3">Wählen Sie wieviele Fachsemester mindestens vorhanden sein sollten.</p>-->

                                            <div>

                                                <label for="fachsemester" class="flex items-center hidden">fachsemester</label>

                                                <select name="fachsemester" id="fachsemester" class="text-gray-500 text-xs py-1 pl-2 pr-8 rounded-sm border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent @error('fachsemester') border-red-500 @enderror">
                                                    <option>Beliebig</option>
                                                    @for ($i = 0; $i < 15; $i++) <option>{{ $i }}</option>
                                                        @endfor
                                                </select>

                                                <script>
                                                    var fachsemester_select = document.getElementById("fachsemester");
                                                    fachsemester_select.value = '{{ $fachsemester }}';
                                                </script>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- Fachsemester -->

                                    <!-- Interessen -->

                                    <script>
                                        var interessen = [];

                                        function addToSelection(interesse, checked) {
                                            console.log(interesse, checked);
                                            if (checked) {
                                                interessen.push(interesse);
                                            } else {
                                                let i = interessen.indexOf(interesse);
                                                interessen.splice(i, 1);
                                            }
                                            console.log(interessen);
                                            document.getElementById('interessen').value = interessen;
                                        }
                                    </script>

                                    <input name="interessen" id="interessen" type=hidden value="" />

                                    <div class="grid grid-cols-1 text-sm text-gray-500 text-light mt-3">

                                        <p class="font-medium text-gray-800 leading-none mb-3">Interessen</p>

                                        <!--<p class="text-xs text-gray-500 mt-1 mb-3">Geben Sie Interessen an, die das Betreuungsverhältnis ergänzen könnten.</p>-->

                                        <div class="flex relative flex-wrap">

                                            <ul class="list-group">

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Sport" onclick="addToSelection(this.value, this.checked)">
                                                    Sport
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Musik" onclick="addToSelection(this.value, this.checked)">
                                                    Musik
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Lesen" onclick="addToSelection(this.value, this.checked)">
                                                    Lesen
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Schreiben" onclick="addToSelection(this.value, this.checked)">
                                                    Schreiben
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Kochen" onclick="addToSelection(this.value, this.checked)">
                                                    Kochen
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Kunst" onclick="addToSelection(this.value, this.checked)">
                                                    Kunst
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Basteln" onclick="addToSelection(this.value, this.checked)">
                                                    Basteln
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Malen" onclick="addToSelection(this.value, this.checked)">
                                                    Malen
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Reisen" onclick="addToSelection(this.value, this.checked)">
                                                    Reisen
                                                </li>

                                                <li class="list-group-item">
                                                    <input class="form-check-input me-1" type="checkbox" value="Tiere" onclick="addToSelection(this.value, this.checked)">
                                                    Tiere
                                                </li>

                                            </ul>

                                        </div>

                                        <script>
                                            let checkboxes = document.getElementsByClassName("form-check-input me-1");
                                            for (let checkbox of checkboxes) {
                                                @foreach($interessen as $interesse)
                                                if (checkbox.value == '{{ $interesse }}')
                                                    checkbox.click();
                                                @endforeach
                                            }
                                        </script>

                                        <!-- Interessen -->

                                        <!-- Suchen -->

                                        <div class="flex justify-end md:gap-8 gap-4 pt-1 rounded-md text-sm">

                                            <button class="flex items-center w-auto bg-gray-700 hover:bg-gray-900 rounded-lg font-medium text-white px-4 py-2">

                                                <div>

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">

                                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />

                                                    </svg>

                                                </div>


                                                <div class="pl-3 sm:inline-block hidden">

                                                    <span>Suchen</span>

                                                </div>

                                            </button>

                                        </div>

                                        <!-- Suchen -->

                                </form>

                            </details>

                            <!-- Details -->

                        </div>

                        <!-- Jumbatron -->

                    </div>

                    <!-- Kontakt -->

                </div>

                <!-- Anzahl -->

                @if ($offers->total() == 0)

                <div class="uppercase text-gray-400 pb-1 sm:pb-2 select-none text-sm text-left">

                    Kein Angebot gefunden.

                </div>

                @elseif ($offers->total() == 1)

                <div class="uppercase text-gray-400 pb-1 sm:pb-2 select-none text-sm text-left">

                    {{ $offers->total() }} Angebot gefunden.

                </div>

                @else

                <div class="uppercase text-gray-400 pb-1 sm:pb-2 select-none text-sm text-left">

                    {{ $offers->total() }} Angebote gefunden.

                </div>

                @endif

                <!-- Anzahl -->

                <!-- Suchfilter -->

                <div class="px-2 sm:px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider rounded-tl-md">

                    Angebote

                </div>

                <div class="shadow-sm rounded-lg">

                    @if ($offers->count())

                    @foreach($offers as $offer)

                    @if($offer->active)

                    <div class="bg-white rounded-md pb-4">

                        <div class="px-1 sm:px-4 sm:px-6 border-t border-gray-200">

                            <!-- Informationen -->

                            <div class="flex items-center justify-between pt-4 leading-5 sm:leading-6 mb-4 text-xs sm:text-lg font-medium">

                                <a class="flex hover:underline" href="{{ route('profile.details', ['id' => $offer->user->id]) }}">

                                    {{ $offer->user->vorname }} {{ $offer->user->nachname }}

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 pt-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>

                                </a>

                                <div>

                                    <span class="text-gray-400 text-xs"><strong><span class="hidden sm:inline-block">Angebot </span> #{{ $offer->id }}</strong> <span class="hidden sm:inline-block">erstellt </span> {{ $offer->created_at->diffForHumans() }}</span>

                                </div>

                            </div>

                            <!-- Informationen -->

                            <div class="block sm:flex sm:flex-wrap content-start">

                                <p class="text-gray-400 text-xs sm:text-sm mr-2 sm:mr-5">Betreuungszeitraum: <span class="font-medium">{{ date('m/Y', strtotime($offer->datum_start)) }} bis {{ date('m/Y', strtotime($offer->datum_end)) }}</span></p>

                                <p class="text-gray-400 text-xs sm:text-sm mr-2 sm:mr-5">Betreuungsrahmen: <span class="font-medium">{{ $offer->rahmen }} Person/en</span></p>

                                <p class="text-gray-400 text-xs sm:text-sm mr-2 sm:mr-5">Schulart: <span class="font-medium">{{ $offer->schulart }}</span></p>

                                <p class="text-gray-400 text-xs sm:text-sm mr-2 sm:mr-5">Fremdsprachkenntnisse: <span class="font-medium">{{ $offer->sprachkenntnisse }}</span></p>

                                <p class="text-gray-400 text-sm mr-5">Interessen: <span class="font-medium">{{ $offer->interessen }}</span></p>

                                <p class="text-gray-400 text-xs sm:text-sm mr-2 sm:mr-5">Studiengang: <span class="font-medium">{{ $offer->studiengang }}</span></p>

                                <p class="text-gray-400 text-xs sm:text-sm mr-2 sm:mr-5">Fachsemester: <span class="font-medium">{{ $offer->fachsemester }}</span></p>

                            </div>

                            @if ($offer->assigned)
                            <div>Dieses Angebot ist momentan vergeben. Eine Anfrage kann sich dennoch lohnen.</div>
                            @endif

                            <!-- Informationen -->

                            <!-- Body -->

                            <p class="text-gray-600 text-sm mt-2 mb-4">{{ $offer->body }}</p>

                            <!-- Body -->

                            <!-- Buttons -->

                            <div class="flex justify-end">

                                @auth

                                @if(!$offer->ownedBy(auth()->user()))

                                <!-- Anfragen -->

                                <form action="{{ route('messages.store') }}" method="post">

                                    {{ csrf_field() }}

                                    <input class="py-2 px-3 bg-gray-100 border-1 w-full rounded-sm form-control form-input" placeholder="Ihr Betreff." value="Anfrage zu Angebot #{{ $offer->id }}" name="subject" type="hidden">

                                    <textarea name="message" placeholder="Ihre Nachricht." style="display:none;">Ich möchte auf Ihr Angebot #{{ $offer->id }} reagieren. Sie suchen {{ $offer->rahmen }} Person/en, wobei folgende Spezifika mit angegeben wurden: Sprachkenntnisse: {{ $offer->sprachkenntnisse }}, Studiengang {{ $offer->studiengang }} und Fachsemester: {{ $offer->fachsemester }}. Der Betreuungszeitraum geht vom {{ date('d.m.Y', strtotime($offer->datum_start)) }} bis zum {{ date('d.m.Y', strtotime($offer->datum_end)) }}. Die Beschreibung Ihres Angebots lautet: {{ $offer->body }} - Hätten Sie Interesse an meiner Unterstützung?</textarea>

                                    <div class="checkbox">

                                        <input name="recipients[]" value="{{  $offer->user->id }}" type="hidden">

                                    </div>

                                    <div class="form-group">

                                        <button type="submit" class="py-2 px-2 rounded-full bg-gray-700 text-white hover:bg-gray-900 hover:ring ring-gray-300 border-2 border-white hover:border-gray-300 text-sm flex focus:outline-none mx-1 transition ease-in-out duration-150 has-tooltip">

                                            <div class="grid justify-items-center">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                                                    <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                                                </svg>

                                                <span class='tooltip rounded p-1 px-2 bg-gray-900 text-white -mt-10 text-xs'>Anfragen</span>

                                            </div>

                                        </button>

                                    </div>

                                </form>

                                <!-- Anfragen -->

                                <a href="mailto:{{  $offer->user->email }}" class="py-2 px-2 rounded-full bg-gray-700 text-white hover:bg-gray-900 hover:ring ring-gray-300 border-2 border-white hover:border-gray-300 text-sm flex focus:outline-none mx-1 transition ease-in-out duration-150 has-tooltip">

                                    <div class="grid justify-items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>

                                        <span class='tooltip rounded p-1 px-2 bg-gray-900 text-white -mt-10 text-xs'>E-Mail schreiben</span>

                                    </div>

                                </a>

                                @hasanyrole('Admin|Moderierende')

                                <!-- Löschen -->

                                <form action="{{ route('offers.destroy', $offer) }}" method="post">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="py-2 px-2 rounded-full bg-yellow-700 text-white hover:bg-yellow-900 hover:ring ring-yellow-300 border-2 border-white hover:border-yellow-300 text-sm flex focus:outline-none mx-1 transition ease-in-out duration-150 has-tooltip">

                                        <div class="grid justify-items-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>

                                            <span class='tooltip rounded p-1 px-2 bg-gray-900 text-white -mt-10 text-xs'>Löschen</span>

                                        </div>

                                    </button>

                                </form>

                                <!-- Löschen -->

                                @else

                                @endhasanyrole

                                @else

                                <!-- Bearbeiten -->

                                <form action="{{ route('offers.edit', $offer) }}" method="post">

                                    @csrf

                                    @method('POST')

                                    <button type="submit" class="py-2 px-2 rounded-full bg-yellow-700 text-white hover:ring ring-yellow-300 border-2 border-white hover:border-yellow-300 text-sm flex focus:outline-none mx-1 transition ease-in-out duration-150 has-tooltip hover:bg-yellow-900 hover:ring ring-yellow-300 border-2 border-white hover:border-yellow-300">

                                        <div class="grid justify-items-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">

                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />

                                            </svg>

                                            <span class='tooltip rounded p-1 px-2 bg-gray-900 text-white -mt-10 text-xs'>Bearbeiten</span>

                                        </div>

                                    </button>

                                </form>

                                <!-- Bearbeiten -->

                                <!-- Angebot deaktivieren -->

                                <form action="{{ route('offers.setinactive', $offer) }}" method="post">

                                    @csrf

                                    <button type="submit" class="py-2 px-2 rounded-full bg-yellow-700 text-white text-sm flex focus:outline-none mx-1 transition ease-in-out duration-150 has-tooltip hover:bg-yellow-900 hover:ring ring-yellow-300 border-2 border-white hover:border-yellow-300">

                                        <div class="grid justify-items-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">

                                                <path d="M3.707 2.293a1 1 0 00-1.414 1.414l6.921 6.922c.05.062.105.118.168.167l6.91 6.911a1 1 0 001.415-1.414l-.675-.675a9.001 9.001 0 00-.668-11.982A1 1 0 1014.95 5.05a7.002 7.002 0 01.657 9.143l-1.435-1.435a5.002 5.002 0 00-.636-6.294A1 1 0 0012.12 7.88c.924.923 1.12 2.3.587 3.415l-1.992-1.992a.922.922 0 00-.018-.018l-6.99-6.991zM3.238 8.187a1 1 0 00-1.933-.516c-.8 3-.025 6.336 2.331 8.693a1 1 0 001.414-1.415 6.997 6.997 0 01-1.812-6.762zM7.4 11.5a1 1 0 10-1.73 1c.214.371.48.72.795 1.035a1 1 0 001.414-1.414c-.191-.191-.35-.4-.478-.622z" />

                                            </svg>

                                            <!-- <span class="mx-3 mt-1">Angebot deaktivieren</span> -->

                                            <span class='tooltip rounded p-1 px-2 bg-gray-900 text-white -mt-10 text-xs'>Deaktivieren</span>

                                        </div>

                                    </button>

                                </form>

                                <!-- Angebot deaktivieren -->

                                @if ($offer->assigned)

                                <!-- Angebot als nicht vergeben markieren -->

                                <form action="{{ route('offers.setnotassigned', $offer) }}" method="post">

                                    @csrf

                                    <button type="submit" class="py-2 px-2 rounded-full bg-yellow-400 text-white text-sm flex focus:outline-none ml-4 transition ease-in-out duration-150 has-tooltip hover:bg-gray-900 hover:ring ring-gray-300 border-2 border-white hover:border-gray-300">

                                        <div class="grid justify-items-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>

                                            <span class='tooltip rounded p-1 px-2 bg-gray-900 text-white -mt-10 text-xs'>Angebot als nicht mehr vergeben markieren</span>

                                        </div>

                                    </button>

                                </form>

                                <!-- Angebot als nicht vergeben markieren -->

                                @else

                                <!-- Angebot als vergeben markieren -->

                                <form action="{{ route('offers.setassigned', $offer) }}" method="post">

                                    @csrf

                                    <button type="submit" class="py-2 px-2 rounded-full bg-yellow-700 text-white text-sm flex focus:outline-none ml-4 transition ease-in-out duration-150 has-tooltip hover:bg-gray-900 hover:ring ring-gray-300 border-2 border-white hover:border-gray-300">

                                        <div class="grid justify-items-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>

                                            <span class='tooltip rounded p-1 px-2 bg-gray-900 text-white -mt-10 text-xs'>Angebot als vergeben markieren</span>

                                        </div>

                                    </button>

                                </form>

                                <!-- Angebot als vergeben markieren -->

                                @endif

                                <!-- Löschen -->

                                <form action="{{ route('offers.destroy', $offer) }}" method="post">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="py-2 px-2 rounded-full bg-yellow-700 text-white hover:ring ring-yellow-300 border-2 border-white hover:border-yellow-300 text-sm flex focus:outline-none mx-1 transition ease-in-out duration-150 has-tooltip hover:bg-yellow-900 hover:ring ring-yellow-300 border-2 border-white hover:border-yellow-300">

                                        <div class="grid justify-items-center">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>

                                            <span class='tooltip rounded p-1 px-2 bg-gray-900 text-white -mt-10 text-xs'>Löschen</span>

                                        </div>

                                    </button>

                                </form>

                                <!-- Löschen -->

                                @endif

                                <!-- Like / Unlike -->

                                <div class="grid justify-items-center ml-2">

                                    @if (!$offer->likedBy(auth()->user()))

                                    <form action="{{ route('offers.likes', $offer) }}" method="post">

                                        @csrf

                                        <!-- Like -->

                                        <button type="submit" class="pt-2 pb-1 text-gray-400 hover:text-gray-700 text-xs flex focus:outline-none">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg><span class="mx-1 mt-1">{{ $offer->likes->count() }}</span>

                                        </button>

                                        <!-- Like -->

                                    </form>

                                    @else

                                    <form action="{{ route('offers.likes', $offer) }}" method="post">

                                        @csrf

                                        @method('DELETE')

                                        <!-- Unlike -->

                                        <button type="submit" class="pt-2 text-gray-400 hover:text-gray-700 text-xs flex focus:outline-none">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg><span class="mx-1 mt-1">{{ $offer->likes->count() }}</span>

                                        </button>

                                        <!-- Unlike -->

                                    </form>

                                    @endif

                                    <!-- Like / Unlike -->

                                    <!-- <div class="text-xs grid justify-center text-purple-300">Gefällt mir</div> -->

                                </div>

                                @endauth

                            </div>

                            <!-- Buttons -->

                        </div>


                    </div>

                    @endif

                    @endforeach

                    @else

                    <p class="hidden">Keine Einträge vorhanden.</p>

                    @endif

                    <!-- Zeige alle offers -->

                </div>

                <div class="mt-5">

                    {{ $offers->links() }}

                </div>

            </div>

            <!-- Alle Angebote -->

        </div>

    </div>

    <!-- Tab Contents -->

</div>

</div>

</div>

<!-- Content -->

@endsection