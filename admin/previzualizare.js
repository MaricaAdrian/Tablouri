             var textval = "";
			 
			 var i = 0;
			 var countd;
			 var counti;
			 var r;
			 var aratamesaj = "<b><font color=\"red\">Atentie, imaginile nu sunt functionabile la momentul actual.</font><br />Previzualizarea este pornita.</b>";
			 var arataeroare = "<b><font color=\"red\">Previzualizarea poate fi eronata , nu sa inchis o structura HTML.</font><br />Previzualizarea este pornita.</b>"
        function myPreview() {
			countd = (textval.match(/(<b>|<i>|<strong>|<h1>|<h2>|<h3>|<h4>|<h5>|<p>)/g) || []).length;
			counti = (textval.match(/(<\/b>|<\/i>|<\/strong>|<\/h1>|<\/h2>|<\/h3>|<\/h4>|<\/h5>|<\/p>)/g) || []).length;
			var text = document.getElementById("insert").value;
			var textval = text.replace("&"," ");
            if(document.getElementById('previz').checked) {
               /* $.post("testprev.php", {text: textval}) */
			   var fereastra;
               fereastra = window.open("testprev.php?text="+textval,"fereastra","width=500,height=500");
            }
            else {
			   var fereastra;
                if(!fereastra.close()){
                    fereastra.close("textprev.php?text="+textval);
                }

            }
            
			
        }
        function verifica(){
            if(document.getElementById('previz').checked) {
                if(counti != countd){alert("Nu ai inchis o strucutra HTML sau folosesti structura in mod gresit; \nExemple corecte: \nBoldat:\n<b>Text</b>\nItalic:\n<i>Text</i>\nStrong:\n<strong>Text</strong>\nHeader:\n<h1>Text</h1>\nLista neordonata:\n<ul>\n\n   <li>Text</li>\n\n</ul>");
				r = confirm("Sunteti sigur ca vreti sa previzualizati textul?");
				if(r == true){
				var fereastra;
                fereastra = window.open("testprev.php?text="+textval,"fereastra","width=500,height=500");
				$(".arata").html(arataeroare);
				$(".arata").fadeIn(1000);}
				else{document.getElementById('previz').checked = false;}
				}
                else{
				var fereastra;
				fereastra = window.open("testprev.php?text="+textval,"fereastra","width=500,height=500");
				$(".arata").html(aratamesaj);
				$(".arata").fadeIn(1000);
				}

            }
            else {
				var fereastra;
                fereastra.close("textprev.php?text="+textval);
                $(".arata").hide(1000);
            }
			
        }