<div class="col-md-4">
  <div class="info-box bg-green">
    <span class="info-box-icon"><i class="ion ion-cash"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Omset</span>
      <span class="info-box-number">2,345,000</span>
      <div class="progress">
        <div class="progress-bar" style="width: 20%"></div>
      </div>
      <span class="progress-description">
        20% Increase in 30 Days
      </span>
    </div><!-- /.info-box-content -->
  </div><!-- /.info-box -->
</div>

<div class="col-md-4">
  <!-- Info Boxes Style 2 -->
  <div class="info-box bg-yellow">
    <span class="info-box-icon"><i class="ion ion-bag"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Cost</span>
      <span class="info-box-number">225,000</span>
      <div class="progress">
        <div class="progress-bar" style="width: 50%"></div>
      </div>
      <span class="progress-description">
        50% Increase in 30 Days
      </span>
    </div><!-- /.info-box-content -->
  </div><!-- /.info-box -->
</div>

<div class="col-md-4">
  <div class="info-box bg-red">
    <span class="info-box-icon"><i class="ion ion-social-usd-outline"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">Credit</span>
      <span class="info-box-number">158,000</span>
      <div class="progress">
        <div class="progress-bar" style="width: 10%"></div>
      </div>
      <span class="progress-description">
        10% Increase in 30 Days
      </span>
    </div><!-- /.info-box-content -->
  </div><!-- /.info-box -->
</div>
<div class="row">
	<div class="col-md-12">
		<!-- AREA CHART -->
	    <div class="box box-primary">
	        <div class="box-header with-border">
	          <h3 class="box-title">Sales Chart</h3>
	          <div class="box-tools pull-right">
	            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div>
	        </div>
	        <div class="box-body">
	          <div class="chart">
	            <canvas id="areaChart" height="260"></canvas>
	          </div>
	        </div><!-- /.box-body -->
	    </div><!-- /.box -->
	</div>
</div>
<script src="<?= base_url('assets/plugins/chartjs/ChartNew.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
	$(function () {
        
        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [
            {
              label: "Sales",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [28, 48, 40, 19, 86, 27, 90]
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: true,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          xAxisLabel : "Month",
          yAxisLabel : "Value",
          legend : true,
          savePng : true,
          savePngOutput: "Save",
          savePngName : "Chart",
          annotateDisplay : true
        };

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);

    });
</script>