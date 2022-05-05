  <!-- Affichage des boutons -->

  <?php if (!empty($_GET['result_deroulant'])) {

        $page = basename($_SERVER["PHP_SELF"]);
        if ($page == "modification_habilitation.php") { ?>
          <div class="columns" style="margin-left: 15%">
              <form method="POST" action="Boutons/gdp.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="GDP" name="GDP" type='submit' class="button"> GDP </button>
              </form>
              <form method="POST" action="Boutons/activ.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="ACTIV" name="ACTIV" type='submit' class="button"> ACTIV </button>
              </form>
              <form method="POST" action="Boutons/maple.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="MAPLE" name="MAPLE" type='submit' class="button"> MAPLE </button>
              </form>
              <form method="POST" action="Boutons/livedoc.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="LIVEDOC" name="LIVEDOC" type='submit' class="button"> LIVEDOC </button>
              </form>
              <form method="POST" action="Boutons/gedaffaire.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="GEDAFFAIRE" name="GEDAFFAIRE" type='submit' class="button"> GEDAFFAIRE </button>
              </form>
              <form method="POST" action="Boutons/oine.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="OINE" name="OINE" type='submit' class="button"> OINE </button>
              </form>
              <form method="POST" action="Boutons/Protys.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <button id="Protys" name="Protys" type='submit' class="button"> Protys </button>
              </form>
              <form method="POST" action="Boutons/gescaf.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="GESCAF" name="GESCAF" type='submit' class="button"> GESCAF </button>
              </form>
              <form method="POST" action="Boutons/e-tech.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="E-TECH" name="E-TECH" type='submit' class="button"> E-TECH </button>
              </form>
              <form method="POST" action="Boutons/mobi.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="MOBI" name="MOBI" type='submit' class="button"> MOBI </button>
              </form>
              <form method="POST" action="Boutons/spi.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>;">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="SPI" name="SPI" type="submit" class="button"> SPI </button>
              </form>
              <form method="POST" action="Boutons/agilis.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="AGILIS" name="AGILIS/PORTAFFAIRE" type='submit' class="button"> AGILIS </button>
              </form>
              <form method="POST" action="Boutons/autodoc.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant']; ?>">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="AUTODOC" name="AUTODOC" type="submit" class="button"> AUTODOC </button>
              </form>
              <form method="POST" action="Boutons/pharaon.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="PHARAON" name="PHARAON" type='submit' class="button"> PHARAON </button>
              </form>
              <form method="POST" action="Boutons/pidi.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="PIDI" name="PIDI" type='submit' class="button"> PIDI </button>
              </form>
              <form method="POST" action="Boutons/gpc.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                  <input type="hidden" id="information" name="information" value="0">
                  <button id="GPC" name="GPC" type='submit' class="button"> GPC </button>
              </form>
              </tr>

          <?php } else { ?>

              <div class="columns" style="margin-left: 15%">
                  <form method="POST" action="gdp.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="GDP" name="GDP" type='submit' class="button"> GDP </button>
                  </form>
                  <form method="POST" action="activ.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="ACTIV" name="ACTIV" type='submit' class="button"> ACTIV </button>
                  </form>
                  <form method="POST" action="maple.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>>
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="MAPLE" name="MAPLE" type='submit' class="button"> MAPLE </button>
                  </form>
                  <form method="POST" action="livedoc.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>>
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="LIVEDOC" name="LIVEDOC" type='submit' class="button"> LIVEDOC </button>
                  </form>
                  <form method="POST" action="gedaffaire.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>>
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="GEDAFFAIRE" name="GEDAFFAIRE" type='submit' class="button"> GEDAFFAIRE </button>
                  </form>
                  <form method="POST" action="oine.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="OINE" name="OINE" type='submit' class="button"> OINE </button>
                  </form>
                  <form method="POST" action="Protys.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="Protys" name="Protys" type='submit' class="button"> Protys </button>
                  </form>
                  <form method="POST" action="gescaf.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="GESCAF" name="GESCAF" type='submit' class="button"> GESCAF </button>
                  </form>
                  <form method="POST" action="e-tech.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="E-TECH" name="E-TECH" type='submit' class="button"> E-TECH </button>
                  </form>
                  <form method="POST" action="mobi.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="MOBI" name="MOBI" type='submit' class="button"> MOBI </button>
                  </form>
                  <form method="POST" action="spi.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="SPI" name="SPI" type="submit" class="button"> SPI </button>
                  </form>
                  <form method="POST" action="agilis.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="AGILIS" name="AGILIS" type='submit' class="button"> AGILIS </button>
                  </form>
                  <form method="POST" action="autodoc.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="AUTODOC" name="AUTODOC" type="submit" class="button"> AUTODOC </button>
                  </form>
                  <form method="POST" action="pharaon.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="PHARAON" name="PHARAON" type='submit' class="button"> PHARAON </button>
                  </form>
                  <form method="POST" action="pidi.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="PIDI" name="PIDI" type='submit' class="button"> PIDI </button>
                  </form>
                  <form method="POST" action="gpc.php?Identifiant=<?php echo $_GET['Identifiant']; ?>&result_deroulant=<?php echo $_GET['result_deroulant'];?>">
                      <input type="hidden" id="information" name="information" value="0">
                      <button id="GPC" name="GPC" type='submit' class="button"> GPC </button>
                  </form>
              <?php   } ?>
              </div>
          </div>

      <?php      } ?>
      <script>
          var tab = ["GDP",
              "ACTIV",
              "MAPLE",
              "LIVEDOC",
              "GEDAFFAIRE",
              "OINE",
              "Protys",
              "GESCAF",
              "E-TECH",
              "MOBI",
              "SPI",
              "AGILIS",
              "AUTODOC",
              "PHARAON",
              "PIDI",
              "GPC",
          ];

          var longueur = tab.length;

          for (var i = 0; i < longueur; i++) {
              document.getElementById(tab[i]).style.display = "none";
          }
      </script>

      <?php
        if (!empty($_GET['result_deroulant'])) {
            $result_deroulant = str_replace("'", "\'", $_GET['result_deroulant']);

            if (isset($_GET['result_deroulant'])) {
                // Requête SQL qui permet d'afficher seulement les bouton selon le metier choisi
                $sql4 = "SELECT `Rôle_Métier_libellé_technique`,`Application` FROM `fiche_nav_metier_app` where  `Rôle_Métier_libellé_technique`='".$result_deroulant."'";
                //echo $sql4;
                $result4 = $bdd->query($sql4);

                $app = [
                    "1" => "GDP",
                    "2" => "ACTIV",
                    "3" => "MAPLE",
                    "4" => "LIVEDOC",
                    "5" => "GEDAFFAIRE",
                    "6" => "OINE",
                    "7" => "Protys",
                    "8" => "GESCAF",
                    "9" => "E-TECH",
                    "10" => "MOBI",
                    "11" => "SPI",
                    "12" => "AGILIS",
                    "13" => "AUTODOC",
                    "14" => "PHARAON",
                    "15" => "PIDI",
                    "16" => "GPC",
                ];


                while ($evenement4 = $result4->fetch()) {
                    for ($i = 1; $i <= 16; $i++) {
                        $pos = strpos($evenement4["Application"], $app[$i]);
                        if ($pos !== false) {
                            if ($app[$i] == "GDP") { ?>
                              <script>
                                  document.getElementById("GDP").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "ACTIV") { ?>
                              <script>
                                  document.getElementById("ACTIV").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "MAPLE") { ?>
                              <script>
                                  document.getElementById("MAPLE").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "LIVEDOC") { ?>
                              <script>
                                  document.getElementById("LIVEDOC").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "GEDAFFAIRE") { ?>
                              <script>
                                  document.getElementById("GEDAFFAIRE").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "OINE") { ?>
                              <script>
                                  document.getElementById("OINE").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "Protys") { ?>
                              <script>
                                  document.getElementById("Protys").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "GESCAF") { ?>
                              <script>
                                  document.getElementById("GESCAF").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "E-TECH") { ?>
                              <script>
                                  document.getElementById("E-TECH").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "MOBI") { ?>
                              <script>
                                  document.getElementById("MOBI").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "SPI") { ?>
                              <script>
                                  document.getElementById("SPI").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "AGILIS") { ?>
                              <script>
                                  document.getElementById("AGILIS").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "AUTODOC") { ?>
                              <script>
                                  document.getElementById("AUTODOC").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "PHARAON") { ?>
                              <script>
                                  document.getElementById("PHARAON").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "PIDI") { ?>
                              <script>
                                  document.getElementById("PIDI").style.display = "inline"
                              </script>
                          <?php }
                            if ($app[$i] == "GPC") { ?>
                              <script>
                                  document.getElementById("GPC").style.display = "inline"
                              </script>
      <?php }
                        }
                    }
                }
            }
        }
        ?>



