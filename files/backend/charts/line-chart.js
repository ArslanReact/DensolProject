window.onload = function () {
    CanvasJS.addColorSet("greenShades",
    [//colorSet Array

    "#6b7079",
    "#ffda00",              
    ]);


var chart2 = new CanvasJS.Chart("chartContainer3", {
        animationEnabled: true,
        title:{
            text: ""
        },
        colorSet:"greenShades",
        dataPointWidth:20,
        axisY: {
            gridThickness: 1,
            gridColor: "#e9ecef",
            title: "",
            titleFontColor: "#6b7079",
            lineColor: "#6b7079",
            labelFontColor: "#6b7079",
            tickColor: "#6b7079"
        },
        // axisY2: {
        //     title: "",
        //     titleFontColor: "#6b7079",
        //     lineColor: "#6b7079",
        //     labelFontColor: "#6b7079",
        //     tickColor: "#6b7079",
        //     backgroundcolor:"#6b7079"
        // },	
        toolTip: {
            shared: true
        },
        legend: {
            cursor:"pointer",
            itemclick: toggleDataSeries
        },
        data: [
            {
            type: "column",
            name: "",
            legendText: "",
            showInLegend: true, 
            dataPoints:[
                { label: "1", y: 166.21 },
                { label: "2", y: 150.25 },
                { label: "3", y: 57.20 },
                { label: "4", y: 48.77 },
                { label: "5", y: 101.50 },
                { label: "6", y: 97.8 }
            ]
        },
        {
            type: "column",	
            name: "",
            legendText: "",
            // axisYType: "secondary",
            showInLegend: true,
            dataPoints:[
                { label: "1", y: 110.46 },
                { label: "2", y: 21.27 },
                { label: "3", y: 31.99 },
                { label: "4", y: 41.45 },
                { label: "5", y: 21.92 },
                { label: "6", y: 31.1 }
            ]
        }
    ]
    });
    chart2.render();
    
    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart2.render();
    }

}