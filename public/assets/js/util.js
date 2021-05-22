function initChart(){

    let cmcBar = $('#chart-bar');

        const dataBar = {
            labels: ["Abacateiro-do-mato", "Ipê-amarelo Pequi", "Cajueiro-do-campo", "Pinheiro-bravo", "Cambará Manguerana", "Tamanqueiro"],
            datasets: [
              {
                label: ["Abacateiro-do-mato", "Ipê-amarelo Pequi", "Cajueiro-do-campo", "Pinheiro-bravo", "Cambará Manguerana", "Tamanqueiro"],  
                data: [1800, 2455, 946, 980, 540, 1500],
                borderColor: ["#00BFFF", "#66CDAA", "#228B22", "#D2691E", "#9400D3", "#DC143C"],
                backgroundColor: ["#00BFFF", "#66CDAA", "#228B22", "#D2691E", "#9400D3", "#DC143C"],
              }
            ]
        };

        let configBar = {
            type: 'bar', //bar line pie
            data: dataBar,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                      display: false,
                    },
                    title: {
                      display: false,
                    }
                }
            }
        };

        new Chart(cmcBar, configBar);

        let cmcPie = $('#chart-pie');

        const dataPie = {
            datasets: [{
                data: [1800, 2455, 946, 980, 540, 1500],
                backgroundColor: ["#00BFFF", "#66CDAA", "#228B22", "#D2691E", "#9400D3", "#DC143C"]
            }],
            labels: ["Abacateiro-do-mato", "Ipê-amarelo Pequi", "Cajueiro-do-campo", "Pinheiro-bravo", "Cambará Manguerana", "Tamanqueiro"]
        };

        let configPie = {
            type: 'pie', //bar line pie
            data: dataPie,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                      display: false,
                    },
                    title: {
                      display: false,
                    }
                }
            }
        };        

        new Chart(cmcPie, configPie);

}

function queryStringToJSON() {            
    
    let retorno = null;
    let pairs = location.search.slice(1).split('&');
    let result = {};
    
    if(pairs.length > 1)
    {
        pairs.forEach(function(pair) {
            pair = pair.split('=');
            result[pair[0]] = decodeURIComponent(pair[1] || '');
        });

        retorno = JSON.parse(JSON.stringify(result));
    }

    return retorno;
}