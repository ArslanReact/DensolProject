window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
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
        //     yValueFormatString: "#0.## °C",
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
            name: "Martha Vineyard",
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
        },
        {
            name: "Nantucket",
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
    chart.render();
    
    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
// ==========
    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,  
        title:{
            text: ""
        },
        axisY: {
            title: "",
            valueFormatString: "#0,,.",
            suffix: "k",
            gridColor: "#e9ecef",
            prefix: "$"
        },
        data: [
            {
                type: "splineArea",
                color: "#26282a",
                markerSize: 5,
                xValueFormatString: "YYYY",
                yValueFormatString: "$#,##0.##",
                dataPoints: [
                    { x: new Date(2000, 0), y: 42890 },
                    { x: new Date(2001, 0), y: 4830000 },
                    { x: new Date(2002, 0), y: 2009000 },
                    { x: new Date(2003, 0), y: 3840000 },
                    { x: new Date(2004, 0), y: 3396000 },
                    { x: new Date(2005, 0), y: 2613000 },
                    { x: new Date(2006, 0), y: 3821000 },
                    { x: new Date(2007, 0), y: 3000000 },
                    { x: new Date(2008, 0), y: 2397000 },
                    { x: new Date(2009, 0), y: 3506000 },
                    { x: new Date(2010, 0), y: 4798000 },
                    { x: new Date(2011, 0), y: 5386000 },
                    { x: new Date(2012, 0), y: 7704000},
                    { x: new Date(2013, 0), y: 7026000 },
                    { x: new Date(2014, 0), y: 3394000 },
                    { x: new Date(2015, 0), y: 2872000 },
                    { x: new Date(2016, 0), y: 3140000 }
                ]
            },
            {
            type: "splineArea",
            color: "#ffcc2a",
            markerSize: 5,
            xValueFormatString: "YYYY",
            yValueFormatString: "$#,##0.##",
            dataPoints: [
                { x: new Date(2000, 0), y: 3289000 },
                { x: new Date(2001, 0), y: 3830000 },
                { x: new Date(2002, 0), y: 2009000 },
                { x: new Date(2003, 0), y: 2840000 },
                { x: new Date(2004, 0), y: 2396000 },
                { x: new Date(2005, 0), y: 1613000 },
                { x: new Date(2006, 0), y: 2821000 },
                { x: new Date(2007, 0), y: 2000000 },
                { x: new Date(2008, 0), y: 1397000 },
                { x: new Date(2009, 0), y: 2506000 },
                { x: new Date(2010, 0), y: 2798000 },
                { x: new Date(2011, 0), y: 3386000 },
                { x: new Date(2012, 0), y: 6704000},
                { x: new Date(2013, 0), y: 6026000 },
                { x: new Date(2014, 0), y: 2394000 },
                { x: new Date(2015, 0), y: 1872000 },
                { x: new Date(2016, 0), y: 2140000 }
            ]
        }]
        });
    chart1.render();
    // ==================

    }

