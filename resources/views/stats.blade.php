@extends ('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <style type="text/css">
            li:hover {
                /*background-color: #EDF2F7 !important;*/
            }
        </style>


    </head>

    <body style="background-color: white;">

        <div class="flex flex-row h-full mx-5 mt-10 mb-10">

            <!-- Nav -->

            @include('layouts.navigation')

            <!-- Nav -->
            
            <!-- Content --> <!-- Del:  h-screen  Old colour: EDF2F7-->

            <div class="px-8 py-8 text-gray-700 w-screen bg-white rounded-r-lg shadow-b border-b border-gray-200" style="background-color: #EDF2F7;">

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">

                    <div class="px-4 py-5 sm:px-6">

                        <h2 class="text-lg leading-6 font-medium text-gray-900">

                            Statistiken

                        </h2>

                        <p class="mt-1 max-w-2xl text-sm text-gray-500">

                            Nutzungsstatistiken des Portals.

                        </p>

                    </div>

                    <!-- Diagramme -->

                    <div class="container px-4 py-4 mx-auto my-6">

                        <!-- Flex -->

                        <div class="flex my-6">
                            
                            <!-- Platz -->

                            <div class="w-1/2 mx-auto">

                                <div class="rounded-md p-6 bg-white">

                                    <div class="mb-2 pb-2 text-left">

                                        <h3 class="font-semibold text-lg text-gray-600">Informationen</h3>

                                        <p class="text-sm text-gray-500 mt-1">
                                          Erhalten Sie Einblicke in die Nutzungsstatistiken des Portals. Momentane Statistiken sind hinsichtlich der Registrierungen, Abmeldungen, Nutzenden,
                                            Zuweisungen, Studiengänge und des Betreuungsverhältnisses einsehbar.
                                        </p>

                                        <p class="text-sm text-gray-500 mt-1">
                                          Kontaktieren Sie bei technischen Anregungen und Anliegen das <a href="mailto:digillab@zlbib.uni-augsburg.de" class="text-purple-500 hover:text-purple-700">DigiLLab</a>.
                                        </p>

                                    </div>

                                </div>

                            </div>

                            <!-- Platz -->

                            <!-- Platz -->

                            <div class="w-1/4 mx-auto">

                                <div class="rounded-md p-6 bg-white">

                                    <div class="mb-2 pb-2 text-center">

                                        <h3 class="font-semibold text-lg text-gray-600">Nutzende</h3>

                                        <p class="text-sm text-gray-500">Nutzende im relativen Vergleich</p>

                                    </div>

                                    <div>

                                        <canvas id="myChart3"></canvas>

                                    </div>

                                </div>

                            </div>

                            <!-- Platz -->

                            <!-- Platz -->

                            <div class="w-1/4 mx-auto">

                                <div class="rounded-md p-6 bg-white">

                                    <div class="mb-2 pb-2 text-center">

                                        <h3 class="font-semibold text-lg text-gray-600">Betreuungsverhältnis</h3>

                                        <p class="text-sm text-gray-500">Helfende und Lernende im relativen Vergleich</p>

                                    </div>

                                    <canvas id="myChart4"></canvas>
                                    
                                </div>

                            </div>

                            <!-- Platz -->      

                        </div>

                        <!-- Flex -->

                        <!-- Flex -->

                        <div class="flex my-6">

                            <div class="sm:w-1 lg:w-1/3 mx-auto">

                                <div class="rounded-md p-6 bg-white">

                                    <div class="text-center mb-2 pb-2">

                                        <h3 class="font-semibold text-lg text-gray-600">Studiengänge</h3>

                                        <p class="text-sm text-gray-500">Teilnehmende der Studiengänge im relativen Vergleich</p>

                                    </div>

                                    <canvas id="myChart"></canvas>
                                    
                                </div>

                            </div>

                            <!-- Platz -->

                            <!-- Platz -->

                            <div class="sm:w-1 lg:w-1/3 mx-auto">

                                <div class="rounded-md p-6 bg-white">

                                    <div class="text-center mb-2 pb-2">

                                        <h3 class="font-semibold text-lg text-gray-600">Zuweisungen</h3>

                                        <p class="text-sm text-gray-500">Entwicklung der Zuweisungen</p>

                                    </div>

                                    <canvas id="myChart2"></canvas>
                                    
                                </div>

                            </div>

                            <!-- Platz -->

                            <div class="sm:w-1 lg:w-1/3 mx-auto">

                                <div class="rounded-md p-6 bg-white">

                                    <div class="text-center mb-2 pb-2">

                                        <h3 class="font-semibold text-lg text-gray-600">Registrierungen und Abmeldungen</h3>

                                        <p class="text-sm text-gray-500">Entwicklung der Helfenden und Lernenden</p>

                                    </div>

                                    <canvas id="myChart5"></canvas>
                                    
                                </div>

                            </div>

                            <!-- Platz -->

                        </div>

                        <!-- Flex -->

                    </div>

                </div>

            </div>

            <!-- Diagramme -->

        </div>

        <!-- Resources -->

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>

            // mychart

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'DaZ/DaF (HF)',
                        'DaZ/DaF (NF)',
                        'Grundschule',
                        'Mittelschule',
                        'Realschule',
                        'Gymnasium',
                        'Sonstiges'],
                    datasets: [{
                        label: 'DaZ/DaF (B.A.)',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                    'rgba(255, 99, 132, 0.9)',
                    'rgba(54, 162, 235, 0.9)',
                    'rgba(255, 206, 86, 0.9)',
                    'rgba(75, 192, 192, 0.9)',
                    'rgba(153, 102, 255, 0.9)',
                    'rgba(255, 159, 64, 0.9)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                      legend: {
                        display: false,
                      }
                    }
                }
            });

            //mychart2


            // Setup
            labels = [
              'January',
              'February',
              'March',
              'April',
              'May',
              'June',
            ];
            data = {
              labels: labels,
              datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
              }]
            };

            // Config
            config = {
              type: 'line',
              data,
              options: {
                responsive: true,
                plugins: {
                  legend: {

                        display: false,

                  }

                }
              }
            };

            // Aufruf
            var myChart = new Chart(
                document.getElementById('myChart2'),
                config
              );



            //mychart3

            // Setup
            DATA_COUNT = 5;
            NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 400};

            labels2 = ['Admins', 'Moderierende', 'Helfende', 'Lehrkräfte'];
            data = {
              labels: labels2,
              datasets: [
                {
                  label: 'Dataset 1',
                  data: [5, 19, 60, 30],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                  ]
                }
              ]
            };

            // Config
            config = {
              type: 'polarArea',
              data: data,
              options: {
                responsive: true,
                plugins: {
                  legend: {
                    position: 'top',
                  }

                }
              },
            };

            // Aufruf
            var myChart = new Chart(
                document.getElementById('myChart3'),
                config
              );



            // mychart4

            // Setup
            DATA_COUNT = 5;
            NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};

            data = {
              labels: [ 'Lernende', 'Helfende'],
              datasets: [
                {
                  label: 'Dataset 1',
                  data: [12, 9],
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.9)',
                    'rgba(54, 162, 235, 0.9)'
                ],
                }
              ]
            };

            // Config
            config = {
              type: 'doughnut',
              data: data,
              options: {
                responsive: true,
                plugins: {
                  legend: {
                    position: 'top',
                  }

                }
              },
            };

            // Aufruf
            var myChart = new Chart(
                document.getElementById('myChart4'),
                config
              );



            // mychart5

            // Setup
            DATA_COUNT = 7;
            NUMBER_CFG = {count: DATA_COUNT, min: -100, max: 100};

            labels = [
              'January',
              'February',
              'March',
              'April',
              'May',
              'June',
            ];
            data = {
              labels: labels,
              datasets: [
                {
                  label: 'Lernende',
                  data: [0, 10, 5, 2, 20, 30, 45,-10,-45,-20],
                  borderColor: 'rgba(255, 99, 132, 1)',
                  backgroundColor: 'rgb(255, 99, 132)',
                },
                {
                  label: 'Helfende',
                  data: [10, 30, 85, 42, 27, -30, -45,10,-15,20],
                  borderColor: 'rgba(54, 162, 235, 1)',
                  backgroundColor: 'rgb(54, 162, 235)',
                }
              ]
            };

            // Config
            config = {
              type: 'bar',
              data: data,
              options: {
                indexAxis: 'y',
                // Elements options apply to all of the options unless overridden in a dataset
                // In this case, we are setting the border of each horizontal bar to be 2px wide
                elements: {
                  bar: {
                    borderWidth: 2,
                  }
                },
                responsive: true,
              },
            };


            // Aufruf
            var myChart = new Chart(
                document.getElementById('myChart5'),
                config
              );


        </script>

    </body>

</html>

@endsection