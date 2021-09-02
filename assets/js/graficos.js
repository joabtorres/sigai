graficoChamados();
graficoTramitacao();
graficoObjetivo();

function graficoChamados() {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            array = JSON.parse(this.responseText);
            geraGraficoPizza(array, 'grafico_tipo_suporte_interno');
        }
    };
    xhttp.open("GET", base_url + "grafico/suporte_interno", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}
function graficoTramitacao() {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            array = JSON.parse(this.responseText);
            geraGraficoPizza(array, 'grafico_tipo_protocolo');
        }
    };
    xhttp.open("GET", base_url + "grafico/protocolo_tipo", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function graficoObjetivo() {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            array = JSON.parse(this.responseText);
            geraGraficoBarraVertical(array, 'grafico_protocolo_objetivo');
        }
    };
    xhttp.open("GET", base_url + "grafico/protocolo_objetivo", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

/**
 * geraGraficoPizza função encarregada para gerar gráfico em pizza
 * @param {array} array -- array contendo os labels e valores
 * @param {string} id_grafico id do grafico
 * @returns {undefined}
 */
function geraGraficoPizza(array, id_grafico) {
    var titulo = [];
    var valores = [];
    for (var i = 0; i < array.length; i++) {
        titulo[i] = (array[i]['label']);
        valores[i] = array[i]['data'];
    }
    var data = {
        datasets: [{
                data: valores,
                backgroundColor: [
                    '#00a950',
                    '#58595b',
                    '#dd4b39',
                    '#537bc4',
                    '#f67019',
                    '#acc236',
                    '#8549ba',
                    '#56d798',
                    '#f53794',
                    '#4dc9f6',
                    '#dd4b39',
                    '#f38b4a',
                    '#56d798',
                    '#f67019',
                    '#166a8f'
                ],
                hoverBackgroundColor: [
                    '#00a950',
                    '#58595b',
                    '#dd4b39',
                    '#537bc4',
                    '#f67019',
                    '#acc236',
                    '#8549ba',
                    '#56d798',
                    '#f53794',
                    '#4dc9f6',
                    '#dd4b39',
                    '#f38b4a',
                    '#56d798',
                    '#f67019',
                    '#166a8f'
                ]
            }],
        labels: titulo
    };
    var option = {
        responsive: true,
        legend: {
            display: true,
            position: 'right'
        },
        title: {
            display: false,
            text: 'Modalidades Registrados'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    };
    var ctx = document.getElementById(id_grafico);
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: option
    });
}

/**
 * geraGraficoBarraVertical função encarregada para gerar gráfico em barra vertical
 * @param {array} array -- array contendo os labels e valores
 * @param {string} id_grafico id do grafico
 * @returns {undefined}
 */


function geraGraficoBarraVertical(array, id_grafico) {
    var dataset = [];
    for (var i = 0; i < array.length; i++) {
        dataset[i] = {
            label: array[i]['label'],
            backgroundColor: gera_cor(),
            borderWidth: 1,
            data: [
                array[i]['data'], 0
            ]
        };
    }
    console.log(dataset);
    var horizontalBarChartData = {
        labels: [],
        datasets: dataset
    };
    var option = {

        elements: {
            rectangle: {
                borderWidth: 1
            }
        },
        responsive: true,
        legend: {
            display: true,
            position: 'right'
        },
        title: {
            display: false,
            text: 'Servidores afastado por unidades'
        }
    };
    var ctx = document.getElementById(id_grafico).getContext('2d');
    window.myHorizontalBar = new Chart(ctx, {
        type: 'bar',
        data: horizontalBarChartData,
        options: option
    });
}

function gera_cor() {
    var hexadecimais = '0123456789ABCDEF';
    var cor = '#';

    // Pega um número aleatório no array acima
    for (var i = 0; i < 6; i++) {
        //E concatena à variável cor
        cor += hexadecimais[Math.floor(Math.random() * 16)];
    }
    return cor;
}