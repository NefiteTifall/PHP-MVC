<?php
ob_start();
?>
    <section id="createArticle">
        <!-- Titre de la section -->
        <h1 class="h3 mb-0 text-gray-800">Créer un article</h1>
        <hr>


        <form action="/article/create" method="POST" enctype="multipart/form-data">
            <label for="title" class="h3 mb-0 text-gray-800">Titre de votre article</label><br>
            <input value="<?= old("title")?>" required type="text" name="title" aria-label="Titre de l'article" placeholder="Titre de l'article"/>
            <p class="error"><?= error("title")?></p>
            <hr>

            <label for="img" class="h3 mb-0 text-gray-800">Image d'illustration</label><br>
            <input value="<?= old("img")?>" required type="file" name="img" aria-label="Image principal de l'article" placeholder="Image principal de l'article"/>
            <p class="error"><?= error("img")?></p>
            <hr>

            <label for="intro" class="h3 mb-0 text-gray-800">introduction de votre article</label><br>
            <textarea required aria-label="Introduction de l'article" placeholder="Introduction de l'article" name="intro"><?= old("intro")?></textarea>
            <p class="error"><?= error("intro")?></p>
            <hr>

            <div id="c">

            </div>

            <div id="add">
                <select id="new">
                    <option value="">Choisissez la configuration de la section</option>
                    <option value="left">Image à gauche et texte à droite</option>
                    <option value="right">Image à droite et  texte à gauche</option>
                    <option value="no">Texte au milieu</option>
                </select>
                <button onclick="newSection(event)" class="full-button-green">Ajouter une section</button>
            </div>

            <button class="full-button-green">Créer l'article</button>
        </form>
    </section>
    <script>

        var cpt = 0;
        var main = document.getElementById("c");
        function newSection(e){
            e.preventDefault();
            let type = document.getElementById("new").value;
            console.log(type);

            if (cpt<3) {
                if (type!="") {
                    cpt++;
                }
                if (type=="left") {

                    let hid = document.createElement("input");
                    hid.setAttribute("type","hidden")
                    hid.setAttribute("name","type"+cpt)
                    hid.value = "left";

                    let b = document.createElement("button");
                    b.setAttribute("class","full-button-green");
                    b.innerHTML = "Supprimer";
                    b.addEventListener("click",(event)=>{
                        event.preventDefault();
                        event.target.parentElement.remove()
                        cpt--;
                    });

                    let dimg = document.createElement("div");
                    let dt = document.createElement("div");
                    let sec = document.createElement("div");
                    sec.setAttribute("class","left")

                    let img = document.createElement("input");
                    let limg = document.createElement("label")
                    img.setAttribute("type","file");
                    img.setAttribute("name","img"+cpt);
                    img.setAttribute("id","img"+cpt);
                    limg.setAttribute('for','img'+cpt);
                    limg.innerHTML = "Image de la section : "

                    dimg.appendChild(limg);
                    dimg.appendChild(img);

                    let t = document.createElement("textarea");
                    let lt = document.createElement("label")
                    t.setAttribute("id","t"+cpt);
                    t.setAttribute("name","t"+cpt);
                    lt.setAttribute('for','t'+cpt);
                    lt.innerHTML = "Texte de la section :";

                    dt.appendChild(lt);
                    dt.appendChild(t);


                    sec.appendChild(dimg);
                    sec.appendChild(dt);
                    sec.appendChild(b);
                    sec.appendChild(hid)

                    main.appendChild(sec);
                }else if(type=="right"){

                    let hid = document.createElement("input");
                    hid.setAttribute("type","hidden")
                    hid.setAttribute("name","type"+cpt)
                    hid.value = "right";

                    let b = document.createElement("button");
                    b.setAttribute("class","full-button-green");
                    b.innerHTML = "Supprimer";
                    b.addEventListener("click",(event)=>{
                        event.preventDefault();
                        event.target.parentElement.remove()
                        cpt--;
                    });

                    let dimg = document.createElement("div");
                    let dt = document.createElement("div");
                    let sec = document.createElement("div");
                    sec.setAttribute("class","right")

                    let img = document.createElement("input");
                    let limg = document.createElement("label")
                    img.setAttribute("type","file");
                    img.setAttribute("name","img"+cpt);
                    img.setAttribute("id","img"+cpt);
                    limg.setAttribute('for','img'+cpt);
                    limg.innerHTML = "Image de la section :"

                    dimg.appendChild(limg);
                    dimg.appendChild(img);

                    let t = document.createElement("textarea");
                    let lt = document.createElement("label")
                    t.setAttribute("id","t"+cpt);
                    t.setAttribute("name","t"+cpt);
                    lt.setAttribute('for','t'+cpt);
                    lt.innerHTML = "Texte de la section :";

                    dt.appendChild(lt);
                    dt.appendChild(t);


                    sec.appendChild(dt);
                    sec.appendChild(dimg);
                    sec.appendChild(b);
                    sec.appendChild(hid)

                    main.appendChild(sec);

                }else if(type=="no"){
                    let hid = document.createElement("input");
                    hid.setAttribute("type","hidden")
                    hid.setAttribute("name","type"+cpt)
                    hid.value = "center";

                    let b = document.createElement("button");
                    b.setAttribute("class","full-button-green");
                    b.innerHTML = "Supprimer";
                    b.addEventListener("click",(event)=>{
                        event.preventDefault();
                        event.target.parentElement.remove()
                        cpt--;
                    });

                    let dt = document.createElement("div");
                    let sec = document.createElement("div");
                    sec.setAttribute("class","right")

                    let t = document.createElement("textarea");
                    let lt = document.createElement("label")
                    t.setAttribute("id","t"+cpt);
                    t.setAttribute("name","t"+cpt);
                    lt.setAttribute('for','t'+cpt);
                    lt.innerHTML = "Texte de la section :";

                    dt.appendChild(lt);
                    dt.appendChild(t);

                    sec.appendChild(dt);
                    sec.appendChild(b);
                    sec.appendChild(hid)

                    main.appendChild(sec);

                }
            }
        }
    </script>


<?php
$description = 'Bienvenue sur FoxWind ';
$title = 'Article';
$style = '<link rel="stylesheet" href="/resources/style/create/create.css">';
$content = ob_get_clean();

require VIEWS . '/FoxWind/Back/layout.php';
