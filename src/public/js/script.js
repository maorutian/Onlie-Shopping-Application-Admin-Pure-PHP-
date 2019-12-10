var lineChartData = {
    labels : ["aaa","bbb","ccc","ddd","eee","fff","ggg"],
    datasets : [
        {
            fillColor : "rgba(255,255,255,0)",
            strokeColor : "#f60",
            pointColor : "#000;",
            pointStrokeColor : "red",
            pointHighlightFill : "red",
            pointHighlightStroke : "#000",
            data : [300,555,655,714,899,905,1000]
        },{
            fillColor : "rgba(255,255,255,0)",
            strokeColor : "rgba(92, 184, 92, 1)",
            pointColor : "rgba(23, 126, 23, 1)",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(151,187,205,1)",
            data : [314,455,755,814,999,905,1000]
        }
        ,{
            fillColor : "rgba(255,255,255,0)",
            strokeColor : "blue",
            pointColor : "rgba(23, 126, 23, 1)",
            pointStrokeColor : "#fff",
            pointHighlightFill : "#fff",
            pointHighlightStroke : "rgba(151,187,205,1)",
            data : [114,255,455,414,599,605,500]
        }
    ]

}

window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myLine = new Chart(ctx).Line(lineChartData, {
        responsive: true
    });
}