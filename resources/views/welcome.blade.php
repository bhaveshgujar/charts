@extends('layout.app')
@section('content')
  <div class="row">
     <div class="col-md-12 col-lg-6"> 
        <div class="card">
          <div class="card-body">  
            <div id="chart1" style="width: 600px;height:400px;">  
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-6"> 
        <div class="card">
          <div class="card-body">  
            <div id="chart2" style="width: 600px;height:400px;"></div>
            <div id="slider"></div>
        </div>
      </div>
    </div> 
    <div class="col-md-12 col-lg-6"> 
        <div class="card">
          <div class="card-body">  
            <div id="chart3" style="width: 600px;height:400px;">  
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-6"> 
        <div class="card">
          <div class="card-body">  
            <div id="chart4" style="width: 600px;height:400px;">  
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-6"> 
        <div class="card">
          <div class="card-body">  
            <div id="chart5" style="width: 600px;height:400px;">  
          </div>
        </div>
      </div>
    </div>      
  </div>
@endsection
@push('after-scripts')
  <script type="text/javascript">
    // Initialize the echarts instance based on the prepared dom
    var chartDom = document.getElementById('chart1');
    var myChart = echarts.init(chartDom);
    var option;

    option = {
    title: {
      text: 'Stacked Area Chart',
      subtext: '15 April - 21 April',
      left: 'center'
    },
    tooltip: {
      trigger: 'axis',
      axisPointer: {
        type: 'cross',
        label: {
          backgroundColor: '#6a7985'
        }
      }
    },
    legend: {
      data: ['Point 1', 'Point 2'],
       bottom: 'bottom',
       padding: 0
    },
    grid: {
      left: '3%',
      right: '4%',
      bottom: '3%',
      containLabel: true
    },
    xAxis: [
      {
        type: 'category',
        boundaryGap: false,
        data: ['15 APRIL', '16 APRIL', '17 APRIL', '18 APRIL', '19 APRIL', '20 APRIL', '21 APRIL']
      }
    ],
    yAxis: [
      {
        type: 'value'
      }
    ],
    color: ['#147AD6','#EC6666'],
    series: [
      {
        name: 'Point 1',
        type: 'line',
        stack: 'Total',
        areaStyle: {},
        emphasis: {
          focus: 'series'
        },
        data: [250, 270,280,160,130,100,250]
      },
      {
        name: 'Point 2',
        type: 'line',
        stack: 'Total',
        areaStyle: {},
        emphasis: {
          focus: 'series'
        },
        data: [500,600,500,400,300,200,350]
      },
      
    ]
  };

  option && myChart.setOption(option);

  // Chart 2

  // Initialize slider
    $("#slider").slider({
      min: 0,
      max: 2, // Assuming you want 3 pie charts
      value: 3,
      step:1,
      slide: function(event, ui) {
        updatePieChart(ui.value);
      }
    });
    // Apply custom styling to slider handle
    $(".ui-slider-handle").addClass("dot-slider");
    // Initial pie chart data
    var pieChartData = [
      [{ value: 76, name: '76 %' },{ value: 24, name: '24 %' }],
      [{ value: 80, name: '80 %' },{ value: 20, name: '20 %' }],
      [{ value: 70, name: '70 %' },{ value: 24, name: '30 %' }]
    ];
    var chartDom1 = document.getElementById('chart2');
    var myChart1 = echarts.init(chartDom1);
    var option1;

  function updatePieChart(index) {
      myChart1.setOption({title: {
      text: 'Pie Chart',
      subtext: 'Here go nubers XX of total XX',
      left: 'center'
    },
      tooltip: {
        trigger: 'item'
      },
      color: ['#147AD6', 'lightgrey'],
      series: [
        {
          name: 'Pie chart',
          type: 'pie',
          radius: ['40%', '70%'],
          avoidLabelOverlap: false,
          label: {
            show: true,
            position: 'center',
            fontWeight: 'bold',
            fontSize: 30
          },
          emphasis: {
            label: {
              show: true,
              fontSize: 40,
              fontWeight: 'bold'
            }
          },
          labelLine: {
            show: true
          },
          data:pieChartData[index]
        }
      ]
    });
  }

  // Initial update of pie chart
  updatePieChart(0);

    //option1 = ;

  //option1 && myChart1.setOption(option1);

  var chartDom2 = document.getElementById('chart3');
  var myChart2 = echarts.init(chartDom2);
  var option2;
  // Specify chart configuration
  var option2 = {
      // Define chart type
      title: {
      text: 'Chart Title',
      subtext: '15 April - 21 April',
      left: 'center'
    },
      xAxis: {
          type: 'category',
          data: ['M', 'T', 'W', 'T', 'F', 'S', 'S']
      },
      yAxis: {
          type: 'value'
      },
      tooltip: {  // Tooltip configuration
        trigger: 'axis', // Trigger type for tooltip
        formatter: '{b} : {c}' // Tooltip content format
      },
      series: [{
          data: [250, 300, 150, 210, 250, 200, 100],
          type: 'line',
          smooth: true,
          areaStyle: {
              color: 'rgba(236, 102, 102, 1)',
               opacity: 0.4 // Specify the fill color
          },
          lineStyle: { // Specify line style
            color: '#EC6666' // Change line color to green
        },
        symbol: 'none'

      }]
  };

  // Set chart configuration and data
  myChart2.setOption(option2);

  var chartDom3 = document.getElementById('chart4');
  var myChart3 = echarts.init(chartDom3);
  var option3;

// Specify chart configuration
var option3 = {
    // Define chart type
    title: {
      text: 'Chart Title',
      subtext: '15 April - 21 April',
      subtextStyle: {
            padding: [0, 0, 10, 0] // Adjust padding bottom (top, right, bottom, left)
        },
      left: 'center'
    },
    xAxis: {
        type: 'category',
        data: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN']
    },
    yAxis: [
        {
            type: 'value', // Left y-axis
        }
    ],
    series: [
        {
            name: 'Bar', // Series name
            data: [500, 500, 500, 500, 500, 500],
            type: 'bar', // Bar chart
            itemStyle: {
                color: 'rgb(242,244,253)',
                emphasis: {
                    color: 'rgb(228,230,247)' // Bar color when hovered
              } 
            },
            lineStyle: { // Specify line style
            color: 'rgb(25,125,214)' // Change line color to green
            },
        },
        {
            name: 'Line', // Series name
            data: [300, 255, 485, 489, 150, 100],
            type: 'line', // Line chart
            smooth: true,
            symbol: 'circle', // Set symbol to circle
            symbolSize: 10, // Set symbol size
            markPoint: {
            data: [{
                type: 'max', // Highlight maximum value
                name: 'Max'
            }]

            }
      }
    ]
};

// Set chart configuration and data
myChart3.setOption(option3);


// Initialize the echarts instance based on the prepared dom
    var chartDom4 = document.getElementById('chart5');
    var myChart4 = echarts.init(chartDom4);
    var option4;

    option4 = {
    title: {
      text: 'Stacked Area Chart',
      subtext: '15 April - 21 April',
      left: 'center'
    },
    tooltip: {
      trigger: 'axis',
      axisPointer: {
        type: 'cross',
        label: {
          backgroundColor: '#6a7985'
        }
      }
    },
    legend: {
      data: ['Point 1', 'Point 2'],
       bottom: 'bottom',
       padding: 0
    },
    grid: {
      left: '3%',
      right: '4%',
      bottom: '3%',
      containLabel: true
    },
    xAxis: [
      {
        type: 'category',
        boundaryGap: false,
        data: ['15 APRIL', '16 APRIL', '17 APRIL', '18 APRIL', '19 APRIL', '20 APRIL', '21 APRIL']
      }
    ],
    yAxis: [
      {
        type: 'value'
      }
    ],
    color: ['rgba(20, 122, 214, 1)','rgba(121, 210, 222, 1)'],
    series: [
      {
        name: 'Point 1',
        type: 'line',
        smooth: true,
        stack: 'Total',
        symbol: 'none',
        areaStyle: {},
        emphasis: {
          //focus: 'series'
        },
        data: [250, 50,100,200,150,200,150]
      },
      {
        name: 'Point 2',
        type: 'line',
        smooth: true,
        symbol: 'none',
        stack: 'Total',
        areaStyle: {},
        emphasis: {
          //focus: 'series'
        },
        data: [500,200,400,400,430,200,500]
      },
      
    ]
  };

  option4 && myChart4.setOption(option4);
        
  </script>      
@endpush