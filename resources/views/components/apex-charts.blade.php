<div id="{!! $chartId !!}"></div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script>
        (function () {
            const chart = new ApexCharts(document.getElementById(`{!! $chartId !!}`), window['{{ $chartId }}-options']);
            chart.render();
            document.addEventListener('livewire:load', () => {
                @this.on(`refreshChartData-{!! $chartId !!}`, (chartData) => {
                    chart.updateOptions({
                        xaxis: {
                            categories: chartData.categories,
                        }
                    });
                    chart.updateSeries(chartData.series);
                })
            });
        }());
    </script>
@endpush