<?php
ob_start();
?>
<form action="/article/<?=$article->getIdArticle()?>/update" method="post" enctype="multipart/form-data">

</form>
    <section id="firstSec">
        <div class="left">
            <img src="<?= $article->getImg()?>"/>
            <label id="img">Nouvelle image : </label>
            <input type="file" name="img" id="img"/>
        </div>
        <div class="right">
            <h1><input value="<?= $article->getTitre()?>" name="titre"/></h1>
            <p><textarea class="textarea" name="intro"><?= $article->getIntro()?></textarea></p>
        </div>
        <div class="square square-clair" id="squareClairArticle"></div>
    </section>

    <?php foreach ($sections as $key=>$section){?>
        <?php if ($section["type"]==="left-img"){?>
            <section class="left-image">
                <div class="left">
                    <img src="<?= $section["image"] ?>"/>
                    <label id="img<?=$key?>">Nouvelle image : </label>
                    <input type="file" name="img<?=$key?>" id="img<?=$key?>"/>
                </div>
                <div class="right">
                    <p><textarea class="textarea" name="t<?=$key?>"><?= $section["content"] ?></textarea></p>
                </div>
            </section>
        <?php }elseif ($section["type"]==="right-img"){?>
            <section class="right-image">
                <div class="left">
                    <p><textarea class="textarea" name="t<?=$key?>"><?= $section["content"] ?></textarea></p>
                </div>
                <div class="right">
                    <img src="<?= $section["image"] ?>"/>
                    <label id="img<?=$key?>">Nouvelle image : </label>
                    <input type="file" name="img<?=$key?>" id="img<?=$key?>"/>
                </div>
            </section>
        <?php }elseif ($section["type"]==="full-img"){?>
            <section class="full-image">
                <div>
                    <p><textarea class="textarea" name="t<?=$key?>"><?= $section["content"] ?></textarea></p>
                </div>
            </section>
        <?php } ?>

    <?php } ?>

    <script>

        var cpt = 0;
        var main = document.getElementById("c");
        function newSection(e,t ,content,img){
            e.preventDefault();
            let type = document.getElementById("new").value;
            console.log(type);

            if (cpt<3) {
                if (type!="") {
                    cpt++;
                }
                if (type=="left" || type=="") {

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

$description = 'Bienvenue sur notre blog';
$title = '';
$style = '<link rel="stylesheet" href="/resources/style/article/article.css">';


$content = ob_get_clean();
require VIEWS . '/layout.php';
