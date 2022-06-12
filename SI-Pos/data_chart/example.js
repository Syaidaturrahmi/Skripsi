    $(document).ready(function () {
        Paket();
        Kinerja();
    });


    function Paket()
    {
        {
            $.post("data_chart/data-katalog.php",
            function (data)
            {
                console.log(data);
                 var tgl = [];
                 var jumlah = [];
                 var kerja = [];

                for (var i in data) {
                    tgl.push(data[i].tgl_input);
                    jumlah.push(data[i].jml);
                    kerja.push(data[i].pekerjaan);
                }

                var chartdata = {
                    labels: tgl,
                    datasets: [
                        {
                            label: "Dokumen",
                            pointBackgroundColor: '#337ab7',
                            borderColor: '#46d5f1',
                            // hoverBackgroundColor: '#5cb85c',
                            // hoverBorderColor: '#8eb85c',
                            data: jumlah
                        }
                    ]
                };

                var graphTarget = $("#Paket");

                var barGraph = new Chart(graphTarget, {
                    type: 'line',
                    data: chartdata
                });
            });
        }
    }

    function Kinerja()
    {
        {
            $.post("data_chart/data.php",
            function (data)
            {
                console.log(data);
                 var nama = [];
                var jumlah = [];

                for (var i in data) {
                    nama.push(data[i].nama);
                    jumlah.push(data[i].jml);
                }

                var chartdata = {
                    labels: nama,
                    datasets: [
                        {
                            label: 'Nama User',
                            backgroundColor: '#337ab7',
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#5cb85c',
                            hoverBorderColor: '#8eb85c',
                            data: jumlah
                        }
                    ]
                };

                var graphTarget = $("#Kinerja");

                var barGraph = new Chart(graphTarget, {
                    type: 'bar',
                    data: chartdata
                });
            });
        }
    }