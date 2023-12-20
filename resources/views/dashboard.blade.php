<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            <span>{{ __('DASHBOARD') }}</span>
            <span class="ml-auto">Bienvenido {{ auth()->user()->name }}</span>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('mensaje'))
            <div class="uppercase border border-green bg-green-100 text-green-600
                font-bold p-2 my-3 rounded mx-8">
                {{ session('mensaje') }}
            </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container mt-5">
                    <div class="row">
                        <div class="col">
                            <div id="container"></div>
                        </div>
                    </div>
                </div>

                {{-- <x-welcome /> --}}

    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    Highcharts.chart('container', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Grafico de Productos'
    },
    tooltip: {
        valueSuffix: '%'
    },
    subtitle: {
        text:
        'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
    },
    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Precio del producto',
            colorByPoint: true,
            data: <?= $data ?>
        }
    ]
});

</script>


</x-app-layout>
