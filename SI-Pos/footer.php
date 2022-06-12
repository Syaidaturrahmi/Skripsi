		<!-- start footer Area -->
		<footer class="footer-area section-gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 single-footer-widget">
						<h4>Top Products</h4>
						<p>
                            Pos Pelayanan Terpadu merupakan bentuk upaya pembangunan kesehatan warga negara yang pengelolaan dan penyelenggaraannya dilakukan dari, oleh, untuk dan bersama masyarakat, serta dimaksudkan memberikan kemudahan dalam akses pelayanan kesehatan dasar.
                        </p>
					</div>
					<div class="col-lg-4 col-md-6 single-footer-widget">
						<h4>Kontak</h4>
                        <a href="" class="h1" style="text-align: center;"><i class="fa fa-whatsapp"></i> 08227477179</a>
                            
					</div>
					<div class="col-lg-4 col-md-6 single-footer-widget">
						<h4>Lokasi</h4>
						<p>
                            Desa Sidua-dua, Kec.Kualuh Selatan, Kab.Labuhanbatu Utara, Sumatera Utara, Medan
                        </p>
					</div>
				</div>
				<div class="footer-bottom row align-items-center">
					<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Sistem Informasi Posyandu Desa Sidua-dua
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					<div class="col-lg-4 col-md-12 footer-social">
						
					</div>
				</div>
			</div>
		</footer>
		<!-- End footer Area -->
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="js/easing.min.js"></script>
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/mn-accordion.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/mail-script.js"></script>
		<script src="js/main.js"></script>
		<!-- Morris JavaScript -->
	    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	    <script src="admin/morris/morris.js"></script>
	    <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
	    <script src="admin/morris/examples/lib/example.js"></script>
	    <!-- Canvas JavaScript -->
	    <script src="canvasjs/canvasjs.min.js"></script>
		<script type="text/javascript">
        Morris.Line({
          element: 'line-graph',
          data: [<?php echo $chartbb; ?>],
          xkey: 'periode',
          ykeys: ['berat'],
          labels: ['Berat Badan'],
          lineColors: ['blue'],
          pointFillColors: ['black'],
          hideHover: 'auto'
        });
        Morris.Area({
          element: 'area-graph',
          data: [<?php echo $charttb; ?>],
          xkey: 'periode',
          ykeys: ['tinggi'],
          labels: ['Tinggi Badan'],
          lineColors: ['red'],
          pointFillColors: ['black'],
          hideHover: 'auto'
        });
	    </script>
	    <script>
		window.onload = function () {
			CanvasJS.addColorSet("greenred",
                [//colorSet Array

                "yellow",
                "lightgreen",
                "red"
            ]);

		    var chart = new CanvasJS.Chart("bbw-graph", {
		      colorSet: "greenred",
		            
		      title:{
		        text: "Berat Badan Balita Perempuan",
		        fontFamily: "Roboto",
		        fontWeight: "bold"              
		      },

		      data: [  //array of dataSeries     
		      { //dataSeries - first quarter
		 /*** Change type "column" to "bar", "area", "line" or "pie"***/        
		       type: "column",
		       name: "Kekurangan",
		       indexLabel: "{y}",
		       indexLabelPlacement: "inside",
		       indexLabelOrientation: "vertical",
		       indexLabelFontFamily: "Roboto",
		       indexLabelFontColor: "white",
		       indexLabelFontSize: 14,
		       indexLabelFontWeight: "bold",
		       showInLegend: true,
		       dataPoints: [
		       { label: "<1 tahun", y: <?= $chartbbw['wast1'] ?> },
		       { label: "<2 tahun", y: <?= $chartbbw['wast2'] ?> },
		       { label: "<3 tahun", y: <?= $chartbbw['wast3'] ?> },                                    
		       { label: "<4 tahun", y: <?= $chartbbw['wast4'] ?> },
		       { label: "<5 tahun", y: <?= $chartbbw['wast5'] ?> }
		       ]
		     },

		     { //dataSeries - second quarter

		      type: "column",
		      name: "Ideal", 
			  indexLabel: "{y}",
			  indexLabelPlacement: "inside",
			  indexLabelOrientation: "vertical",
			  indexLabelFontFamily: "Roboto",
			  indexLabelFontColor: "white",
			  indexLabelFontSize: 14,
			  indexLabelFontWeight: "bold",
		      showInLegend: true,               
		      dataPoints: [
		      { label: "<1 tahun", y: <?= $chartbbw['ideal1'] ?> },
		       { label: "<2 tahun", y: <?= $chartbbw['ideal2'] ?> },
		       { label: "<3 tahun", y: <?= $chartbbw['ideal3'] ?> },                                    
		       { label: "<4 tahun", y: <?= $chartbbw['ideal4'] ?> },
		       { label: "<5 tahun", y: <?= $chartbbw['ideal5'] ?> }
		      ]
		    },

		    { //dataSeries - third quarter

		      type: "column",
		      name: "Kelebihan", 
			  indexLabel: "{y}",
			  indexLabelPlacement: "inside",
			  indexLabelOrientation: "vertical",
			  indexLabelFontFamily: "Roboto",
			  indexLabelFontColor: "white",
			  indexLabelFontSize: 14,
			  indexLabelFontWeight: "bold",
		      showInLegend: true,               
		      dataPoints: [
		      { label: "<1 tahun", y: <?= $chartbbw['obe1'] ?> },
		       { label: "<2 tahun", y: <?= $chartbbw['obe2'] ?> },
		       { label: "<3 tahun", y: <?= $chartbbw['obe3'] ?> },                                    
		       { label: "<4 tahun", y: <?= $chartbbw['obe4'] ?> },
		       { label: "<5 tahun", y: <?= $chartbbw['obe5'] ?> }
		      ]
		    }
		    ],
		 /** Set axisY properties here*/
		    axisY:{
		      title: "Jumlah Balita",
		      titleFontFamily: "Roboto"
		    }    
		  });
		    chart.render();

		    CanvasJS.addColorSet("bluerange",
                [//colorSet Array

                "blue",
                "green",
                "purple"
            ]);

		    var chart = new CanvasJS.Chart("bbp-graph", {
		      colorSet: "bluerange",
		            
		      title:{
		        text: "Berat Badan Balita Laki-laki",
		        fontFamily: "Roboto",
		        fontWeight: "bold"              
		      },

		      data: [  //array of dataSeries     
		      { //dataSeries - first quarter
		 /*** Change type "column" to "bar", "area", "line" or "pie"***/        
		       type: "column",
		       name: "Kekurangan",
		       indexLabel: "{y}",
		       indexLabelPlacement: "inside",
		       indexLabelOrientation: "vertical",
		       indexLabelFontFamily: "Roboto",
		       indexLabelFontColor: "white",
		       indexLabelFontSize: 14,
		       indexLabelFontWeight: "bold",
		       showInLegend: true,
		       dataPoints: [
		       { label: "<1 tahun", y: <?= $chartbbp['wast1'] ?> },
		       { label: "<2 tahun", y: <?= $chartbbp['wast2'] ?> },
		       { label: "<3 tahun", y: <?= $chartbbp['wast3'] ?> },                                    
		       { label: "<4 tahun", y: <?= $chartbbp['wast4'] ?> },
		       { label: "<5 tahun", y: <?= $chartbbp['wast5'] ?> }
		       ]
		     },

		     { //dataSeries - second quarter

		      type: "column",
		      name: "Ideal", 
			  indexLabel: "{y}",
			  indexLabelPlacement: "inside",
			  indexLabelOrientation: "vertical",
			  indexLabelFontFamily: "Roboto",
			  indexLabelFontColor: "white",
			  indexLabelFontSize: 14,
			  indexLabelFontWeight: "bold",
		      showInLegend: true,               
		      dataPoints: [
		      { label: "<1 tahun", y: <?= $chartbbp['ideal1'] ?> },
		       { label: "<2 tahun", y: <?= $chartbbp['ideal2'] ?> },
		       { label: "<3 tahun", y: <?= $chartbbp['ideal3'] ?> },                                    
		       { label: "<4 tahun", y: <?= $chartbbp['ideal4'] ?> },
		       { label: "<5 tahun", y: <?= $chartbbp['ideal5'] ?> }
		      ]
		    },

		    { //dataSeries - third quarter

		      type: "column",
		      name: "Kelebihan", 
			  indexLabel: "{y}",
			  indexLabelPlacement: "inside",
			  indexLabelOrientation: "vertical",
			  indexLabelFontFamily: "Roboto",
			  indexLabelFontColor: "white",
			  indexLabelFontSize: 14,
			  indexLabelFontWeight: "bold",
		      showInLegend: true,               
		      dataPoints: [
		      { label: "<1 tahun", y: <?= $chartbbp['obe1'] ?> },
		       { label: "<2 tahun", y: <?= $chartbbp['obe2'] ?> },
		       { label: "<3 tahun", y: <?= $chartbbp['obe3'] ?> },                                    
		       { label: "<4 tahun", y: <?= $chartbbp['obe4'] ?> },
		       { label: "<5 tahun", y: <?= $chartbbp['obe5'] ?> }
		      ]
		    }
		    ],
		 /** Set axisY properties here*/
		    axisY:{
		      title: "Jumlah Balita",
		      titleFontFamily: "Roboto"
		    }    
		  });

		chart.render();

		CanvasJS.addColorSet("greenred",
                [//colorSet Array

                "yellow",
                "lightgreen",
                "red"
            ]);
      // Bar Chart Tinggi Badan Pria
        var chart = new CanvasJS.Chart("tbw-graph", {
          colorSet: "greenred",
                
          title:{
            text: "Tinggi Badan Balita Perempuan",
            fontFamily: "Roboto",
            fontWeight: "bold"              
          },

          data: [  //array of dataSeries     
          { //dataSeries - first quarter
     /*** Change type "column" to "bar", "area", "line" or "pie"***/        
           type: "column",
           name: "Kekurangan",
           indexLabel: "{y}",
           indexLabelPlacement: "inside",
           indexLabelOrientation: "vertical",
           indexLabelFontFamily: "Roboto",
           indexLabelFontColor: "white",
           indexLabelFontSize: 14,
           indexLabelFontWeight: "bold",
           showInLegend: true,
           dataPoints: [
           { label: "<1 tahun", y: <?= $charttbw['wast1'] ?> },
           { label: "<2 tahun", y: <?= $charttbw['wast2'] ?> },
           { label: "<3 tahun", y: <?= $charttbw['wast3'] ?> },                                    
           { label: "<4 tahun", y: <?= $charttbw['wast4'] ?> },
           { label: "<5 tahun", y: <?= $charttbw['wast5'] ?> }
           ]
         },

         { //dataSeries - second quarter

          type: "column",
          name: "Ideal", 
        indexLabel: "{y}",
        indexLabelPlacement: "inside",
        indexLabelOrientation: "vertical",
        indexLabelFontFamily: "Roboto",
        indexLabelFontColor: "white",
        indexLabelFontSize: 14,
        indexLabelFontWeight: "bold",
          showInLegend: true,               
          dataPoints: [
          { label: "<1 tahun", y: <?= $charttbw['ideal1'] ?> },
           { label: "<2 tahun", y: <?= $charttbw['ideal2'] ?> },
           { label: "<3 tahun", y: <?= $charttbw['ideal3'] ?> },                                    
           { label: "<4 tahun", y: <?= $charttbw['ideal4'] ?> },
           { label: "<5 tahun", y: <?= $charttbw['ideal5'] ?> }
          ]
        },

        { //dataSeries - third quarter

          type: "column",
          name: "Kelebihan", 
        indexLabel: "{y}",
        indexLabelPlacement: "inside",
        indexLabelOrientation: "vertical",
        indexLabelFontFamily: "Roboto",
        indexLabelFontColor: "white",
        indexLabelFontSize: 14,
        indexLabelFontWeight: "bold",
          showInLegend: true,               
          dataPoints: [
          { label: "<1 tahun", y: <?= $charttbw['obe1'] ?> },
           { label: "<2 tahun", y: <?= $charttbw['obe2'] ?> },
           { label: "<3 tahun", y: <?= $charttbw['obe3'] ?> },                                    
           { label: "<4 tahun", y: <?= $charttbw['obe4'] ?> },
           { label: "<5 tahun", y: <?= $charttbw['obe5'] ?> }
          ]
        }
        ],
     /** Set axisY properties here*/
        axisY:{
          title: "Jumlah Balita",
          titleFontFamily: "Roboto"
        }    
      });
        chart.render();

        CanvasJS.addColorSet("bluerange",
                [//colorSet Array

                "blue",
                "green",
                "purple"
            ]);
        // Bar Chart Tinggi Badan Wanita
        var chart = new CanvasJS.Chart("tbp-graph", {
          colorSet: "bluerange",
                
          title:{
            text: "Tinggi Badan Balita Laki-laki",
            fontFamily: "Roboto",
            fontWeight: "bold"              
          },

          data: [  //array of dataSeries     
          { //dataSeries - first quarter
     /*** Change type "column" to "bar", "area", "line" or "pie"***/        
           type: "column",
           name: "Kekurangan",
           indexLabel: "{y}",
           indexLabelPlacement: "inside",
           indexLabelOrientation: "vertical",
           indexLabelFontFamily: "Roboto",
           indexLabelFontColor: "white",
           indexLabelFontSize: 14,
           indexLabelFontWeight: "bold",
           showInLegend: true,
           dataPoints: [
           { label: "<1 tahun", y: <?= $charttbp['wast1'] ?> },
           { label: "<2 tahun", y: <?= $charttbp['wast2'] ?> },
           { label: "<3 tahun", y: <?= $charttbp['wast3'] ?> },                                    
           { label: "<4 tahun", y: <?= $charttbp['wast4'] ?> },
           { label: "<5 tahun", y: <?= $charttbp['wast5'] ?> }
           ]
         },

         { //dataSeries - second quarter

          type: "column",
          name: "Ideal", 
        indexLabel: "{y}",
        indexLabelPlacement: "inside",
        indexLabelOrientation: "vertical",
        indexLabelFontFamily: "Roboto",
        indexLabelFontColor: "white",
        indexLabelFontSize: 14,
        indexLabelFontWeight: "bold",
          showInLegend: true,               
          dataPoints: [
          { label: "<1 tahun", y: <?= $charttbp['ideal1'] ?> },
           { label: "<2 tahun", y: <?= $charttbp['ideal2'] ?> },
           { label: "<3 tahun", y: <?= $charttbp['ideal3'] ?> },                                    
           { label: "<4 tahun", y: <?= $charttbp['ideal4'] ?> },
           { label: "<5 tahun", y: <?= $charttbp['ideal5'] ?> }
          ]
        },

        { //dataSeries - third quarter

          type: "column",
          name: "Kelebihan", 
        indexLabel: "{y}",
        indexLabelPlacement: "inside",
        indexLabelOrientation: "vertical",
        indexLabelFontFamily: "Roboto",
        indexLabelFontColor: "white",
        indexLabelFontSize: 14,
        indexLabelFontWeight: "bold",
          showInLegend: true,               
          dataPoints: [
          { label: "<1 tahun", y: <?= $charttbp['obe1'] ?> },
           { label: "<2 tahun", y: <?= $charttbp['obe2'] ?> },
           { label: "<3 tahun", y: <?= $charttbp['obe3'] ?> },                                    
           { label: "<4 tahun", y: <?= $charttbp['obe4'] ?> },
           { label: "<5 tahun", y: <?= $charttbp['obe5'] ?> }
          ]
        }
        ],
     /** Set axisY properties here*/
        axisY:{
          title: "Jumlah Balita",
          titleFontFamily: "Roboto"
        }    
      });

    chart.render();
		}
		</script>
	</body>
</html>