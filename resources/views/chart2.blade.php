@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">  
    var year = ['2013','2014','2015', '2016'];  
    var data_click = <?php echo $click; ?>;  
    var data_viewer = <?php echo $viewer; ?>;  
  
    var barChartData = {  
        labels: year,  
        datasets: [{  
            label: 'Click',  
            backgroundColor: "rgba(220,220,220,0.5)",  
            data: data_click  
        }, {  
            label: 'View',  
            backgroundColor: "rgba(151,187,205,0.5)",  
            data: data_viewer  
        }]  
    };  
    window.onload = function() {  
        var ctx = document.getElementById("canvas").getContext("2d");  
        window.myBar = new Chart(ctx, {  
            type: 'bar',  
            data: barChartData,  
            options: {  
                elements: {  
                    rectangle: {  
                        borderWidth: 2,  
                        borderColor: 'rgb(0, 255, 0)',  
                        borderSkipped: 'bottom'  
                    }  
                },  
                responsive: true,  
                title: {  
                    display: true,  
                    text: 'Yearly Website Visitor'  
                }  
            }  
        });  
  
    };  
</script>  

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>How to Use Charts.JS in Laravel 9? - Mywebtuts.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Mono', monospace;
    }
    h1{
        text-align: center;
        font-size:35px;
        font-weight:900;
    }
</style>

<body>
    <h1>How to Use Charts.JS in Laravel 9 - LaravelTuts.com</h1>
   
    <canvas id="canvas" height="100px"></canvas>
</body>
  