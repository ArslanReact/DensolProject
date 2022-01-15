window.onload = function () {
// =====chartContainer-order=====
var chartContainerorder = new CanvasJS.Chart("chartContainerorder", {
    animationEnabled: true,
    title:{
        text: ""
    },
    axisX: {
        valueFormatString: "DD MMM,YY"
    },
    axisY: {
        title: "",
        suffix: " $",
        gridColor: "#e9ecef",
    },
    legend:{
        cursor: "pointer",
        fontSize: 16,
        itemclick: toggleDataSeries
    },
    toolTip:{
        shared: true
    },
    data: [
    //     {
    //     name: "Myrtle Beach",
    //     type: "spline",
    //     yValueFormatString: "#0.## 째C",
    //     showInLegend: true,
    //     dataPoints: [
    //         { x: new Date(2017,6,24), y: 31 },
    //         { x: new Date(2017,6,25), y: 31 },
    //         { x: new Date(2017,6,26), y: 29 },
    //         { x: new Date(2017,6,27), y: 29 },
    //         { x: new Date(2017,6,28), y: 31 },
    //         { x: new Date(2017,6,29), y: 30 },
    //         { x: new Date(2017,6,30), y: 29 }
    //     ]
    // },
    {
        name: "Orders",
        type: "spline",
        color:"#26282a",
        yValueFormatString: "#0.## $k",
        showInLegend: true,
        dataPoints: [
            { x: new Date(2020,6,24), y: 22 },
            { x: new Date(2020,6,25), y: 19 },
            { x: new Date(2020,6,26), y: 23 },
            { x: new Date(2020,6,27), y: 24 },
            { x: new Date(2020,6,28), y: 24 },
            { x: new Date(2020,6,29), y: 23 },
            { x: new Date(2020,6,30), y: 23 }
        ]
    }]
});
chartContainerorder.render();
function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
// =====chartContainer-sales=====
var chartContainersales = new CanvasJS.Chart("chartContainersales", {
    animationEnabled: true,
    title:{
        text: ""
    },
    axisX: {
        valueFormatString: "DD MMM,YY"
    },
    axisY: {
        title: "",
        suffix: " $",
        gridColor: "#e9ecef",
    },
    legend:{
        cursor: "pointer",
        fontSize: 16,
        itemclick: toggleDataSeries
    },
    toolTip:{
        shared: true
    },
    data: [
    //     {
    //     name: "Myrtle Beach",
    //     type: "spline",
    //     yValueFormatString: "#0.## 째C",
    //     showInLegend: true,
    //     dataPoints: [
    //         { x: new Date(2017,6,24), y: 31 },
    //         { x: new Date(2017,6,25), y: 31 },
    //         { x: new Date(2017,6,26), y: 29 },
    //         { x: new Date(2017,6,27), y: 29 },
    //         { x: new Date(2017,6,28), y: 31 },
    //         { x: new Date(2017,6,29), y: 30 },
    //         { x: new Date(2017,6,30), y: 29 }
    //     ]
    // },
    {
        name: "Sales",
        type: "spline",
        yValueFormatString: "#0.## $k",
        color:"#ffcc2a",
        showInLegend: true,
        dataPoints: [
            { x: new Date(2020,6,24), y: 20 },
            { x: new Date(2020,6,25), y: 20 },
            { x: new Date(2020,6,26), y: 25 },
            { x: new Date(2020,6,27), y: 25 },
            { x: new Date(2020,6,28), y: 25 },
            { x: new Date(2020,6,29), y: 25 },
            { x: new Date(2020,6,30), y: 25 }
        ]
    }]
});
chartContainersales.render();
function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
}