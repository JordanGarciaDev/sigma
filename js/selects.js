$(function() {
			$("#departamento").change(function() {

				var $dropdown = $(this);

				$.getJSON("jsondata/colombia.json", function(data) {

					var key = $dropdown.val();
					var vals = [];
					var texto = "'"+key+"'";

					switch (key) {
						case  "Amazonas":
							vals = data.Amazonas;
							break;
						case  "Atlántico":
							vals = data.Atlántico;
							break;
						case  "Caquetá":
							vals = data.Caquetá;
							break;
						case  "Cesar":
							vals = data.Cesar;
							break;
						case  "Chocó":
							vals = data.Chocó;
							break;
						case  "Córdoba":
							vals = data.Córdoba;
							break;
						case  "Guainía":
							vals = data.Guainía;
							break;
						case  "Guaviare":
							vals = data.Guaviare;
							break;
						case  "Huila":
							vals = data.Huila;
							break;
						// case  "La Guajira":
						// 	vals = data.La_Guajira;
						// 	break;
						case  "Putumayo":
							vals = data.Putumayo;
							break;
						case  "Quindío":
							vals = data.Quindío;
							break;
						// case  "San Andrés y Providencia":
						// 	vals = data.San Andrés y Providencia;
						// 	break;
						case  "Sucre":
							vals = data.Sucre;
							break;
						case  "Tolima":
							vals = data.Tolima;
							break;
						case  "Vaupés":
							vals = data.Vaupés;
							break;
						case  "Vichada":
							vals = data.Vichada;
							break;
					}

					var $jsontwo = $("#municipio");
					$jsontwo.empty();
					$.each(vals, function(index, value) {
						$jsontwo.append("<option>" + value + "</option>");
					});

				});
			});

		});