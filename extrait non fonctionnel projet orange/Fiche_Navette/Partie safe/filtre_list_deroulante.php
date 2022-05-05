<script>
    // Fonction permettant de retouné la valeur du champ choisi dans la liste déroulante et de l'afficher
    function listmultipleresult() {
        var spanresult = document.getElementById("result");
        spanresult.value = "";
        var tabresult = [];
        var tourresult = 0;
        var x = document.getElementById("selectmetier");

        // Récupération de la valeur de retour de la liste de déroulant des métiers
        for (var i = 0; i < x.options.length; i++) {
            if (x.options[i].selected === true) {
                spanresult.value += x.options[i].value + " ";
                tabresult[tourresult] = x.options[i].value;
                document.getElementById("result").innerHTML = spanresult.value;
                document.getElementById("result").style.color = "green";
                tourresult++;
                document.getElementById("result_deroulant").value = spanresult.value;
            }
        }
        for (var i = 0; i < tabresult.length; i++) {
            document.getElementById("deroulant" + i).value = tabresult[i];

        }
        
    }
</script>