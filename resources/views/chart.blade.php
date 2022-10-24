@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>How to Use Charts.JS in Laravel 9? - Mywebtuts.com</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Mono', monospace;
    }

    h1 {
        text-align: center;
        font-size: 35px;
        font-weight: 900;
    }
</style>

<body>

    <div class="container">
        <h1>How to Use Charts.JS in Laravel 9 - LaravelTuts.com</h1>
        <canvas id="myChart" height="400" width="900"></canvas>
        <canvas id="myChart2" height="400" width="900"></canvas>
        <div class="row">
            <div class="col-6">
                <canvas id="MyChart3" height="400" width="900"></canvas>
            </div>
            <div class="col-6">
                <canvas id="MyChart3Pie" height="400" width="900"></canvas>
            </div>
        </div>
    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <br> -->
<!-- {{$nomeCitta[1]->name}} -->

<!-- <?php echo json_encode($arrayNomi); ?> -->
<!-- <?php echo json_encode($arrayCitta); ?> -->
<!-- <?php echo json_encode($arrayDensita); ?> -->
<!-- <?php echo json_encode($arraySup); ?> -->
<!-- <br> -->
<!-- @foreach ($popCitta as $pop)

{{$pop->popolation}}
    
@endforeach -->

<!-- @foreach ($nomeCitta as $object)
    {{ $object->name }}
@endforeach
{{$object->name}}
     -->
<script type="text/javascript">
    var densita = <?php echo json_encode($arrayDensita); ?>;
    var citta = <?php echo json_encode($arrayNomi); ?>;
    var popolazioni = <?php echo json_encode($arrayCitta); ?>;
    var superfice = <?php echo json_encode($arraySup); ?>;

    $(function() {
        let myCanvas = document.getElementById("myChart").getContext('2d');


        var popCitta = <?php echo $popCitta; ?>;
        let myLabels = <?php echo json_encode($nomeCitta); ?>

        //console.log(nomeCitta);
        // GRAFICO A BARRE VERTICALI
        let chart = new Chart(myCanvas, {
            type: 'bar',
            data: {
                labels: citta,
                datasets: [{
                        label: "Popolazione per città",
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        borderColor: 'rgb(255, 99, 132)',
                        data: popolazioni,


                    },
                    {
                        label: "Densità ab./km2",
                        backgroundColor: "#ffc107",
                        borderColor: 'rgb(255, 99, 132)',
                        data: densita,


                    },
                    {
                        label: "Superficie km^2",
                        backgroundColor: "#0dcaf0",
                        borderColor: 'rgb(255, 99, 132)',
                        data: superfice,


                    }
                ]
            },
            options: {
                indexAxis: 'x',
                title: {
                    display: true,
                    text: "Popolazione citta'",
                    fontSize: 48,
                },
                layout: {
                    padding: 0,
                }
            }
        });
        
        let myCanvas2 = document.getElementById("myChart2").getContext('2d');
        // GRAFICO A BARRE ORIZZONTALI
        let chart2 = new Chart(myCanvas2, {
            type: 'bar',
            data: {
                labels: citta,
                datasets: [{
                        label: "Popolazione per città",
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        borderColor: 'rgb(255, 99, 132)',
                        data: popolazioni,


                    },
                    {
                        label: "Densità ab./km2",
                        backgroundColor: "#ffc107",
                        borderColor: 'rgb(255, 99, 132)',
                        data: densita,


                    },
                    {
                        label: "Superficie km^2",
                        backgroundColor: "#0dcaf0",
                        borderColor: 'rgb(255, 99, 132)',
                        data: superfice,


                    }
                ]
            },
            options: {
                indexAxis: 'y',
                title: {
                    display: true,
                    text: "Popolazione citta'",
                    fontSize: 48,
                },
                layout: {
                    padding: 0,
                }
            }
        });

        // GRAFICI A TORTA
        let myCanvas3 = document.getElementById("MyChart3").getContext('2d');
        let chart3 = new Chart(myCanvas3, {
            type: 'doughnut',
            data: {
                labels: citta,
                datasets: [{
                        label: "Popolazione per città",
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        borderColor: 'rgb(255, 99, 132)',
                        data: popolazioni,


                    },
                    {
                        label: "Densità ab./km2",
                        backgroundColor: "#ffc107",
                        borderColor: 'rgb(255, 99, 132)',
                        data: densita,


                    },
                    {
                        label: "Superficie km^2",
                        backgroundColor: "#0dcaf0",
                        borderColor: 'rgb(255, 99, 132)',
                        data: superfice,


                    }
                ]
            },
            options: {
                indexAxis: 'y',
                title: {
                    display: true,
                    text: "Popolazione citta'",
                    fontSize: 48,
                },
                layout: {
                    padding: 0,
                }
            }
        });
        let myCanvas3Pie = document.getElementById("MyChart3Pie").getContext('2d');
        let chart3Pie = new Chart(myCanvas3Pie, {
            type: 'pie',
            data: {
                labels: citta,
                datasets: [{
                        label: "Popolazione per città",
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        borderColor: 'rgb(255, 99, 132)',
                        data: popolazioni,


                    },
                    {
                        label: "Densità ab./km2",
                        backgroundColor: "#ffc107",
                        borderColor: 'rgb(255, 99, 132)',
                        data: densita,


                    },
                    {
                        label: "Superficie km^2",
                        backgroundColor: "#0dcaf0",
                        borderColor: 'rgb(255, 99, 132)',
                        data: superfice,


                    }
                ]
            },
            options: {
                indexAxis: 'y',
                title: {
                    display: true,
                    text: "Popolazione citta'",
                    fontSize: 48,
                },
                layout: {
                    padding: 0,
                }
            }
        });

    });
</script>

</html>
@endsection