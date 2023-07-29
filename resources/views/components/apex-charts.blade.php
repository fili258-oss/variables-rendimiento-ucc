<div id="{{ $chartId }}"></div>

@push('scripts')
<script>
    (function () {
        const options = {
            chart: {
                id: 2,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    barHeight: '100%',
                    distributed: true,
                    dataLabels: {
                        // position: 'bottom'
                    },
                }
            },
            xaxis: {
                type: 'category',
                categories: ["Hola","Hola","Hola","Hola","Hola",]
            },
            series: [{
                name: 'Totales',
                data: [2.3, 3.1, 4.0, 10.1, 4.0]
            }],
            // colors: ['#5c6ac4', '#007ace'],
        }
        const chart = new ApexCharts(document.getElementById("#chartId"), options);
        chart.render();
        /* document.addEventListener('livewire:load', () => {
            @this.on(`refreshChartData-{!! $chartId !!}`, (chartData) => {
                chart.updateOptions({
                    xaxis: {
                        categories: chartData.categories
                    }
                });
                chart.updateSeries([{
                    data: chartData.seriesData,
                    name: chartData.seriesName,
                }]);
            });
        }); */
    }());
</script>
@endpush