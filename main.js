var graficoBarras = document.getElementById('graficoBarras').getContext('2d');

const tiposgraficas = ['bar', 'line'];
const colores = ['rgb(76, 158, 212)', 'rgb(26, 175, 93)'];
const nombresdegraficas = ['Facturación', 'Promedio'];
var response = $.ajax({
    url: './Controller.php',
    type: 'POST',
    data: {
        'tiposgraficas': tiposgraficas,
        'colores': colores,
        'nombresdegraficas': nombresdegraficas
    },
});
response.done(function(m) {
    console.log(m);
    var config = JSON.parse(m);
    var barrasChart = new Chart(graficoBarras, config);
})

// var barrasChart = new Chart(graficoBarras, config);


// var pieChart = new Chart(graficoPie, config2);